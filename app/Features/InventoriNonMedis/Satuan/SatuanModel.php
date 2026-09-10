<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Satuan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SatuanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new SatuanDatabase(),
            [
                'id_satuan'   => V::DEFAULT(),
                'kode_satuan' => V::DEFAULT(),
                'nama_satuan' => V::DEFAULT(),
            ],
            [],
        );
    }

    /**
     * Cek apakah id_satuan masih direferensikan. FK di *_structure tidak aktif pada
     * jalur data nyata (tabel *_encrypted, kolom FK bytea), jadi penolakan ditegakkan
     * di lapisan aplikasi.
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function is_referenced(int $id_satuan): bool
    {
        if ($id_satuan <= 0)
            return false;

        $sql =
            'SELECT 1 WHERE '
            . 'EXISTS (SELECT 1 FROM inventori_non_medis.barang WHERE id_satuan = ?) '
            . 'OR EXISTS (SELECT 1 FROM inventori_non_medis.permintaan_barang_detail WHERE id_satuan_baru = ?) '
            . 'LIMIT 1';

        $result = $this->db->query($sql, [$id_satuan, $id_satuan]);
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query is_referenced gagal dieksekusi.');

        return $result->getRowArray() !== null;
    }
}
