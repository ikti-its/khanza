<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\DataKeuangan;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\BaseResult;

/**
 * Data inventori non medis yang dibutuhkan modul keuangan: nilai pengadaan per suplier
 * (beserta rekening tujuan pembayaran), nilai barang yang sudah diterima, dan nilai persediaan.
 * Hanya membaca; dapat dipanggil langsung oleh fitur keuangan di aplikasi ini
 * (new DataKeuanganService($db)) atau lewat endpoint JSON DataKeuanganController.
 */
final class DataKeuanganService
{
    // nilai diterima per baris penerimaan; harga kosong memakai harga di pengadaan
    private const NILAI_TERIMA = '
        prd.qty_diterima * COALESCE(prd.harga_satuan, (
            SELECT pbd.harga_satuan FROM inventori_non_medis.pengadaan_barang_detail pbd
            WHERE pbd.id_pengadaan = pr.id_pengadaan AND pbd.id_barang = prd.id_barang LIMIT 1
        ), 0)';

    public function __construct(
        private BaseConnection $db,
    ) {}

    // pastikan hasil query valid
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): BaseResult
    {
        assert($result instanceof BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    /**
     * @param list<mixed> $binds
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function rows(string $sql, array $binds = []): array
    {
        /** @var list<array<string, mixed>> */
        return $this->guarded($this->db->query($sql, $binds))->getResultArray();
    }

    /**
     * Daftar pengadaan (tidak termasuk yang dibatalkan) dengan total harga, nilai yang sudah
     * diterima gudang, dan rekening suplier. Tanggal dalam format Y-m-d, boleh kosong.
     *
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function pengadaan(null|string $dari = null, null|string $sampai = null): array
    {
        $rows = $this->rows('
            SELECT pd.id_pengadaan, pd.no_pengadaan, pd.tanggal, pj.no_pengajuan,
                   st.nama_status_pengadaan_barang AS status, op.nama AS petugas,
                   s.kode_suplier, s.nama_suplier, s.no_telp, bk.nama_bank, r.nomor_rekening, r.nama_akun,
                   COALESCE(pd.total_harga, 0) AS total_harga,
                   COALESCE((
                       SELECT SUM(' . self::NILAI_TERIMA . ')
                       FROM inventori_non_medis.penerimaan_barang_detail prd
                       JOIN inventori_non_medis.penerimaan_barang pr ON prd.id_penerimaan = pr.id_penerimaan
                       WHERE pr.id_pengadaan = pd.id_pengadaan AND pr.id_status_penerimaan_barang = 2
                   ), 0) AS nilai_diterima
            FROM inventori_non_medis.pengadaan_barang pd
            LEFT JOIN inventori_non_medis.pengajuan_barang pj ON pd.id_pengajuan = pj.id_pengajuan
            LEFT JOIN inventori_non_medis.status_pengadaan_barang st ON pd.id_status_pengadaan_barang = st.id_status_pengadaan_barang
            LEFT JOIN inventori_non_medis.suplier s ON pd.id_suplier = s.id_suplier
            LEFT JOIN finansial.rekening r ON s.id_rekening = r.id_rekening
            LEFT JOIN finansial.bank bk ON r.bank = bk.id_bank
            LEFT JOIN role.petugas pp ON pd.petugas = pp.id_petugas
            LEFT JOIN person.orang op ON pp.id_orang = op.id_orang
            WHERE pd.id_pengadaan > 0 AND pd.id_status_pengadaan_barang <> 3
              AND (?::date IS NULL OR pd.tanggal::date >= ?::date)
              AND (?::date IS NULL OR pd.tanggal::date <= ?::date)
            ORDER BY pd.tanggal DESC, pd.id_pengadaan DESC
        ', [
            $dari,
            $dari,
            $sampai,
            $sampai,
        ]);

        return array_map(fn(array $r): array => array_merge($this->angka($r, ['total_harga', 'nilai_diterima']), [
            'id_pengadaan' => (int) $r['id_pengadaan'],
            'sisa_nilai'   => max(0.0, (float) $r['total_harga'] - (float) $r['nilai_diterima']),
        ]), $rows);
    }

    /**
     * Satu pengadaan beserta rincian barang: qty, harga, subtotal, qty dan nilai yang sudah diterima.
     * Pengadaan dicari dengan id (13) atau nomor dokumen yang tertera di Surat Pemesanan (PGD202610110001).
     *
     * @return array<string, mixed>|null
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function detail_pengadaan(int|string $pengadaan): null|array
    {
        $header =
            array_values(array_filter($this->pengadaan(), fn(array $r): bool => is_int($pengadaan)
                ? $r['id_pengadaan'] === $pengadaan
                : strcasecmp((string) $r['no_pengadaan'], $pengadaan) === 0))[0] ?? null;
        if ($header === null)
            return null;
        $id_pengadaan = (int) $header['id_pengadaan'];

        $barang = $this->rows('
            SELECT b.kode_barang, b.nama_barang, sat.nama_satuan, d.qty,
                   COALESCE(d.harga_satuan, 0) AS harga_satuan, COALESCE(d.subtotal, 0) AS subtotal,
                   COALESCE((
                       SELECT SUM(prd.qty_diterima) FROM inventori_non_medis.penerimaan_barang_detail prd
                       JOIN inventori_non_medis.penerimaan_barang pr ON prd.id_penerimaan = pr.id_penerimaan
                       WHERE pr.id_pengadaan = d.id_pengadaan AND prd.id_barang = d.id_barang
                         AND pr.id_status_penerimaan_barang = 2
                   ), 0) AS qty_diterima
            FROM inventori_non_medis.pengadaan_barang_detail d
            LEFT JOIN inventori_non_medis.barang b ON d.id_barang = b.id_barang
            LEFT JOIN inventori_non_medis.satuan sat ON b.id_satuan = sat.id_satuan
            WHERE d.id_pengadaan = ? AND d.id_barang > 0
            ORDER BY b.nama_barang
        ', [$id_pengadaan]);

        $header['barang'] = array_map(fn(array $r): array => array_merge(
            $this->angka($r, ['harga_satuan', 'subtotal']),
            [
                'qty'            => (int) $r['qty'],
                'qty_diterima'   => (int) $r['qty_diterima'],
                'nilai_diterima' => (int) $r['qty_diterima'] * (float) $r['harga_satuan'],
            ],
        ), $barang);

        return $header;
    }

    /**
     * Penerimaan berstatus Diterima: dasar pencatatan hutang/pembayaran ke suplier.
     *
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function penerimaan(null|string $dari = null, null|string $sampai = null): array
    {
        $rows = $this->rows('
            SELECT pr.id_penerimaan, pr.no_penerimaan, pr.no_masuk, pr.tanggal, pd.no_pengadaan,
                   s.nama_suplier, o.nama AS penerima,
                   COALESCE(SUM(prd.qty_diterima), 0) AS qty_diterima,
                   COALESCE(SUM(' . self::NILAI_TERIMA . '), 0) AS nilai
            FROM inventori_non_medis.penerimaan_barang pr
            JOIN inventori_non_medis.pengadaan_barang pd ON pr.id_pengadaan = pd.id_pengadaan
            LEFT JOIN inventori_non_medis.suplier s ON pd.id_suplier = s.id_suplier
            LEFT JOIN role.petugas pt ON pr.petugas = pt.id_petugas
            LEFT JOIN person.orang o ON pt.id_orang = o.id_orang
            LEFT JOIN inventori_non_medis.penerimaan_barang_detail prd ON prd.id_penerimaan = pr.id_penerimaan
            WHERE pr.id_penerimaan > 0 AND pr.id_status_penerimaan_barang = 2
              AND (?::date IS NULL OR pr.tanggal::date >= ?::date)
              AND (?::date IS NULL OR pr.tanggal::date <= ?::date)
            GROUP BY pr.id_penerimaan, pr.no_penerimaan, pr.no_masuk, pr.tanggal, pd.no_pengadaan, s.nama_suplier, o.nama
            ORDER BY pr.tanggal DESC, pr.id_penerimaan DESC
        ', [
            $dari,
            $dari,
            $sampai,
            $sampai,
        ]);

        return array_map(fn(array $r): array => array_merge($this->angka($r, ['nilai']), [
            'id_penerimaan' => (int) $r['id_penerimaan'],
            'qty_diterima'  => (int) $r['qty_diterima'],
        ]), $rows);
    }

    /**
     * Data barang dengan stok, harga satuan, dan nilai persediaan (stok x harga).
     *
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function barang(): array
    {
        $rows = $this->rows('
            SELECT b.id_barang, b.kode_barang, b.nama_barang, s.nama_satuan, j.nama_jenis_barang,
                   COALESCE(b.stok, 0) AS stok, COALESCE(b.harga_satuan, 0) AS harga_satuan
            FROM inventori_non_medis.barang b
            LEFT JOIN inventori_non_medis.satuan s ON b.id_satuan = s.id_satuan
            LEFT JOIN inventori_non_medis.jenis_barang j ON b.id_jenis_barang = j.id_jenis_barang
            WHERE b.id_barang <> 0
            ORDER BY b.kode_barang
        ');

        return array_map(fn(array $r): array => array_merge($this->angka($r, ['harga_satuan']), [
            'id_barang'        => (int) $r['id_barang'],
            'stok'             => (int) $r['stok'],
            'nilai_persediaan' => (int) $r['stok'] * (float) $r['harga_satuan'],
        ]), $rows);
    }

    /**
     * Ringkasan nilai untuk dasbor keuangan dalam rentang tanggal pengadaan/penerimaan.
     *
     * @return array<string, int|float|string|null>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function ringkasan(null|string $dari = null, null|string $sampai = null): array
    {
        $pengadaan = $this->pengadaan($dari, $sampai);

        return [
            'dari'                   => $dari,
            'sampai'                 => $sampai,
            'jumlah_pengadaan'       => count($pengadaan),
            'total_nilai_pengadaan'  => $this->jumlah($pengadaan, 'total_harga'),
            'total_nilai_diterima'   => $this->jumlah($this->penerimaan($dari, $sampai), 'nilai'),
            'total_nilai_persediaan' => $this->jumlah($this->barang(), 'nilai_persediaan'),
        ];
    }

    /** @param list<array<string, mixed>> $rows */
    private function jumlah(array $rows, string $kolom): float
    {
        return array_sum(array_map(fn(array $r): float => (float) ($r[$kolom] ?? 0), $rows));
    }

    // kolom uang dikirim sebagai angka, bukan string numeric dari driver
    /**
     * @param array<string, mixed> $row
     * @param list<string> $kolom
     * @return array<string, mixed>
     */
    private function angka(array $row, array $kolom): array
    {
        foreach ($kolom as $k) {
            $row[$k] = (float) ($row[$k] ?? 0);
        }
        return $row;
    }
}
