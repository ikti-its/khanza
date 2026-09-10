<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\JenisBarang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JenisBarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new JenisBarangDatabase(),
            [
                'id_jenis_barang'   => V::DEFAULT(),
                'kode_jenis_barang' => V::DEFAULT(),
                'nama_jenis_barang' => V::DEFAULT(),
            ],
            [],
        );
    }

    /**
     * Cek apakah id_jenis_barang masih direferensikan. FK di *_structure tidak aktif
     * pada jalur data nyata (tabel *_encrypted, kolom FK bytea), jadi penolakan
     * ditegakkan di lapisan aplikasi.
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function is_referenced(int $id_jenis_barang): bool
    {
        if ($id_jenis_barang <= 0)
            return false;

        $sql =
            'SELECT 1 WHERE '
            . 'EXISTS (SELECT 1 FROM inventori_non_medis.barang WHERE id_jenis_barang = ?) '
            . 'OR EXISTS (SELECT 1 FROM inventori_non_medis.permintaan_barang_detail WHERE id_jenis_barang_baru = ?) '
            . 'LIMIT 1';

        $result = $this->db->query($sql, [$id_jenis_barang, $id_jenis_barang]);
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query is_referenced gagal dieksekusi.');

        return $result->getRowArray() !== null;
    }
}
