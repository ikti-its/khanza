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
}
