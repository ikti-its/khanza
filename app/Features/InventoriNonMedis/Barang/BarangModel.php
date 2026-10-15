<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class BarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new BarangDatabase(),
            [
                'id_barang'    => V::DEFAULT(),
                'kode_barang'  => V::DEFAULT(),
                'nama_barang'  => V::DEFAULT(),
                'stok'         => V::DEFAULT(),
                'stok_minimum' => V::DEFAULT(),
                'harga_satuan' => V::DEFAULT(),
            ],
            [
                'id_satuan'       => ['nama_satuan'],
                'id_jenis_barang' => ['nama_jenis_barang'],
            ],
        );
    }

    /**
     * Cek apakah id_barang masih direferensikan oleh salah satu view detail transaksi.
     *
     * Pengganti FK: constraint di *_structure tidak aktif pada jalur data nyata
     * (view ber-INSTEAD OF trigger di atas tabel *_encrypted, kolom id_barang bytea),
     * sehingga integritas referensial harus ditegakkan di lapisan aplikasi.
     *
     * Satu query gabungan dengan OR EXISTS — Postgres berhenti pada EXISTS pertama
     * yang terpenuhi.
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function is_referenced(int $id_barang): bool
    {
        if ($id_barang <= 0)
            return false;

        $sql =
            'SELECT 1 WHERE '
            . 'EXISTS (SELECT 1 FROM inventori_non_medis.transaksi_stok_detail   WHERE id_barang = ?) '
            . 'OR EXISTS (SELECT 1 FROM inventori_non_medis.permintaan_barang_detail WHERE id_barang = ?) '
            . 'OR EXISTS (SELECT 1 FROM inventori_non_medis.pengajuan_barang_detail  WHERE id_barang = ?) '
            . 'OR EXISTS (SELECT 1 FROM inventori_non_medis.pengadaan_barang_detail  WHERE id_barang = ?) '
            . 'OR EXISTS (SELECT 1 FROM inventori_non_medis.penerimaan_barang_detail WHERE id_barang = ?) '
            . 'OR EXISTS (SELECT 1 FROM inventori_non_medis.stok_opname_detail       WHERE id_barang = ?) '
            . 'LIMIT 1';

        $result = $this->db->query($sql, array_fill(0, 6, $id_barang));
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query is_referenced gagal dieksekusi.');

        return $result->getRowArray() !== null;
    }

    /**
     * Tetapkan kode untuk barang baru: kunci → MAX + 1 → periksa duplikat. Wajib dipanggil
     * di dalam transaksi yang sama dengan insert-nya, dan insert sebelum commit; kunci
     * dilepas saat commit/rollback, sehingga penyimpanan berikutnya membaca MAX yang baru.
     *
     * @throws \RuntimeException kode ternyata sudah dipakai
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    public function tetapkan_kode_barang(): string
    {
        $this->kunci_kode_barang();
        $kode = $this->kode_barang_berikutnya();

        if ($this->kode_barang_terpakai($kode)) {
            throw new \RuntimeException("Kode Barang {$kode} sudah digunakan. Silakan simpan ulang.");
        }
        return $kode;
    }

    /**
     * Serialkan penomoran kode barang (pola no_pengembalian di F13): dua penyimpanan
     * bersamaan menunggu bergantian, jadi tidak bisa membaca MAX yang sama. Pengganti
     * UNIQUE — constraint di barang_structure tidak tersentuh jalur data nyata (lihat
     * is_referenced). pg_advisory_xact_lock dilepas otomatis saat commit/rollback.
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function kunci_kode_barang(): void
    {
        $this->db->query('SELECT pg_advisory_xact_lock(hashtext(?))', ['inventori_non_medis.barang.kode_barang']);
    }

    /**
     * Kode barang berikutnya = MAX nomor seri BRG + 1. Bukan COUNT atau kode milik
     * id_barang terbesar: keduanya salah begitu ada barang yang dihapus atau kodenya
     * diubah (BRG0041 saat ini ada di id_barang 5). Tanpa kunci hanya untuk pratinjau di
     * form; kode yang disimpan selalu lewat tetapkan_kode_barang().
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    public function kode_barang_berikutnya(): string
    {
        helper('autonomor');

        $result = $this->db->query("SELECT MAX(CAST(SUBSTRING(kode_barang FROM 4) AS integer)) AS nomor
             FROM inventori_non_medis.barang
             WHERE kode_barang ~ '^BRG[0-9]{4,7}$'");
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query kode_barang_berikutnya gagal dieksekusi.');

        /** @var array{nomor: int|string|null}|null $baris MAX = NULL bila belum ada barang */
        $baris = $result->getRowArray();
        $nomor = $baris['nomor'] ?? null;
        return generateNextKodeBarang($nomor === null ? null : (int) $nomor);
    }

    /**
     * Pemeriksaan duplikat saat simpan. Tetap dijalankan walau kode dihasilkan sistem:
     * basis data tidak menolak kode kembar (lihat kunci_kode_barang).
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function kode_barang_terpakai(string $kode_barang): bool
    {
        $result = $this->db->query('SELECT 1 FROM inventori_non_medis.barang WHERE kode_barang = ? LIMIT 1', [
            $kode_barang,
        ]);
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query kode_barang_terpakai gagal dieksekusi.');

        return $result->getRowArray() !== null;
    }
}
