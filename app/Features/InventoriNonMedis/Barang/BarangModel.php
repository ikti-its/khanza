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

    // cek barang masih dipakai di transaksi
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
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

    // ambil kode baru + cek duplikat
    /**
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

    // kunci supaya kode tidak kembar
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function kunci_kode_barang(): void
    {
        $this->db->query('SELECT pg_advisory_xact_lock(hashtext(?))', ['inventori_non_medis.barang.kode_barang']);
    }

    // kode berikutnya = nomor terbesar + 1
    /**
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

        /** @var array{nomor: int|string|null}|null $baris */
        $baris = $result->getRowArray();
        $nomor = $baris['nomor'] ?? null;
        return generateNextKodeBarang($nomor === null ? null : (int) $nomor);
    }

    // cek kode sudah dipakai atau belum
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function kode_barang_terpakai(string $kode_barang): bool
    {
        $result = $this->db->query('SELECT 1 FROM inventori_non_medis.barang WHERE kode_barang = ? LIMIT 1', [
            $kode_barang,
        ]);
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query kode_barang_terpakai gagal dieksekusi.');

        return $result->getRowArray() !== null;
    }
}
