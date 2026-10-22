<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengembalianBarang;

use CodeIgniter\Database\BaseConnection;

final class PengembalianBarangService
{
    // id sesuai status_pengembalian_barang.csv
    public const STATUS_DRAF                = 1;
    public const STATUS_PROSES_PENGEMBALIAN = 2;
    public const STATUS_SELESAI             = 3;
    public const STATUS_DITOLAK             = 4;

    // tipe_transaksi_stok.csv
    public const TIPE_TRANSAKSI_KELUAR       = 2;
    public const TIPE_TRANSAKSI_PENGEMBALIAN = 4;

    private const STATUS_PERMINTAAN_ELIGIBLE = [6];

    public function __construct(
        private BaseConnection $db,
    ) {}

    // pastikan hasil query valid
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): \CodeIgniter\Database\BaseResult
    {
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    // permintaan selesai yang boleh dikembalikan
    /**
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function permintaan_eligible(null|int $id_permintaan = null): array
    {
        $builder = $this->db
            ->table('inventori_non_medis.permintaan_barang pb')
            ->join('ruangan.ruangan r', 'pb.master_ruangan = r.id_ruangan', 'left')
            ->select('pb.id_permintaan, pb.no_permintaan, pb.tanggal, pb.master_ruangan, r.nama_ruangan')
            ->whereIn('pb.id_status_permintaan_barang', self::STATUS_PERMINTAAN_ELIGIBLE)
            ->where('pb.id_permintaan >', 0);

        if ($id_permintaan !== null) {
            $builder->where('pb.id_permintaan', $id_permintaan);
        }

        /** @var list<array<string, mixed>> */
        return $this->guarded(
            $builder->orderBy('pb.tanggal', 'DESC')->orderBy('pb.id_permintaan', 'DESC')->get(),
        )->getResultArray();
    }

    // permintaan yang masih punya sisa kuota
    /**
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function permintaan_dapat_dikembalikan(null|int $id_permintaan = null): array
    {
        $hasil = [];
        foreach ($this->permintaan_eligible($id_permintaan) as $p) {
            if (
                array_filter($this->sisa_kuota((int) $p['id_permintaan']), static fn(int $sisa): bool => $sisa > 0)
                !== []
            ) {
                $hasil[] = $p;
            }
        }
        return $hasil;
    }

    // sisa kuota per barang
    /**
     * @return array<int, int> id_barang => sisa
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function sisa_kuota(int $id_permintaan): array
    {
        $sisa = [];
        foreach ($this->rincian_kuota($id_permintaan) as $row) {
            $sisa[$row['id_barang']] = $row['sisa'];
        }
        return $sisa;
    }

    // qty keluar, sudah kembali, dan sisa
    /**
     * @return list<array{id_barang: int, kode_barang: string, nama_barang: string, nama_satuan: string, qty_keluar: int, sudah_dikembalikan: int, sisa: int}>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function rincian_kuota(int $id_permintaan): array
    {
        $rows = $this->guarded($this->db->query('
            WITH keluar AS (
                SELECT tsd.id_barang, SUM(tsd.qty) AS qty_keluar
                FROM inventori_non_medis.transaksi_stok ts
                JOIN inventori_non_medis.transaksi_stok_detail tsd ON tsd.id_transaksi = ts.id_transaksi
                WHERE ts.id_permintaan = ?
                  AND ts.id_tipe_transaksi_stok = ?
                GROUP BY tsd.id_barang
            ), kembali AS (
                SELECT d.id_barang,
                       SUM(CASE p.id_status_pengembalian_barang
                               WHEN ? THEN COALESCE(d.qty_diverifikasi, 0)
                               ELSE d.qty_diajukan
                           END) AS qty_kembali
                FROM inventori_non_medis.pengembalian_barang p
                JOIN inventori_non_medis.pengembalian_barang_detail d ON d.id_pengembalian = p.id_pengembalian
                WHERE p.id_permintaan = ?
                  AND p.id_status_pengembalian_barang IN (?, ?)
                GROUP BY d.id_barang
            )
            SELECT k.id_barang, b.kode_barang, b.nama_barang, s.nama_satuan,
                   k.qty_keluar,
                   COALESCE(r.qty_kembali, 0) AS sudah_dikembalikan,
                   k.qty_keluar - COALESCE(r.qty_kembali, 0) AS sisa
            FROM keluar k
            LEFT JOIN kembali r ON r.id_barang = k.id_barang
            LEFT JOIN inventori_non_medis.barang b ON b.id_barang = k.id_barang
            LEFT JOIN inventori_non_medis.satuan s ON s.id_satuan = b.id_satuan
            ORDER BY b.nama_barang ASC
            ', [
            $id_permintaan,
            self::TIPE_TRANSAKSI_KELUAR,
            self::STATUS_SELESAI,
            $id_permintaan,
            self::STATUS_SELESAI,
            self::STATUS_PROSES_PENGEMBALIAN,
        ]))->getResultArray();

        return array_values(array_map(static fn(array $r): array => [
            'id_barang'          => (int) $r['id_barang'],
            'kode_barang'        => (string) ($r['kode_barang'] ?? '-'),
            'nama_barang'        => (string) ($r['nama_barang'] ?? '-'),
            'nama_satuan'        => (string) ($r['nama_satuan'] ?? '-'),
            'qty_keluar'         => (int) $r['qty_keluar'],
            'sudah_dikembalikan' => (int) $r['sudah_dikembalikan'],
            'sisa'               => (int) $r['sisa'],
        ], $rows));
    }

    // rincian barang satu pengembalian
    /**
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function detail_items(int $id_pengembalian): array
    {
        /** @var list<array<string, mixed>> */
        return $this->guarded(
            $this->db
                ->table('inventori_non_medis.pengembalian_barang_detail d')
                ->join('inventori_non_medis.barang b', 'd.id_barang = b.id_barang', 'left')
                ->join('inventori_non_medis.satuan s', 'b.id_satuan = s.id_satuan', 'left')
                ->select(
                    'd.id_detail, d.id_barang, d.qty_diajukan, d.qty_diverifikasi, d.catatan, b.kode_barang, b.nama_barang, b.stok, s.nama_satuan',
                )
                ->where('d.id_pengembalian', $id_pengembalian)
                ->orderBy('b.nama_barang', 'ASC')
                ->get(),
        )->getResultArray();
    }

    // daftar pengembalian dari satu permintaan
    /**
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function pengembalian_by_permintaan(int $id_permintaan): array
    {
        /** @var list<array<string, mixed>> */
        return $this->guarded($this->db->query('
            SELECT p.id_pengembalian, p.no_pengembalian, p.tanggal,
                   p.id_status_pengembalian_barang, s.nama_status_pengembalian_barang,
                   COALESCE(SUM(d.qty_diajukan), 0)     AS total_qty_diajukan,
                   COALESCE(SUM(d.qty_diverifikasi), 0) AS total_qty_diverifikasi
            FROM inventori_non_medis.pengembalian_barang p
            LEFT JOIN inventori_non_medis.status_pengembalian_barang s
                   ON s.id_status_pengembalian_barang = p.id_status_pengembalian_barang
            LEFT JOIN inventori_non_medis.pengembalian_barang_detail d ON d.id_pengembalian = p.id_pengembalian
            WHERE p.id_permintaan = ?
            GROUP BY p.id_pengembalian, p.no_pengembalian, p.tanggal,
                     p.id_status_pengembalian_barang, s.nama_status_pengembalian_barang
            ORDER BY p.tanggal DESC, p.id_pengembalian DESC
            ', [$id_permintaan]))->getResultArray();
    }

    // kunci per permintaan supaya tidak bentrok
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    public function lock_permintaan(int $id_permintaan): void
    {
        $this->db->query('SELECT pg_advisory_xact_lock(hashtext(?))', [
            'inventori_non_medis.pengembalian_barang:permintaan:' . $id_permintaan,
        ]);
    }
}
