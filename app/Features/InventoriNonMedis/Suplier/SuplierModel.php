<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Suplier;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SuplierModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new SuplierDatabase(),
            [
                'id_suplier'   => V::DEFAULT(),
                'kode_suplier' => V::DEFAULT(),
                'nama_suplier' => V::DEFAULT(),
                'no_telp'      => V::DEFAULT(),
                'alamat'       => V::DEFAULT(),
            ],
            [
                'id_kota'     => ['nama_kota'],
                'id_rekening' => [
                    'nomor_rekening',
                    'nama_akun',
                    'bank' => ['nama_bank'],
                ],
            ],
        );
    }

    /**
     * Cek apakah id_suplier masih direferensikan oleh pengadaan barang. FK di
     * *_structure tidak aktif pada jalur data nyata (tabel *_encrypted, kolom FK
     * bytea), jadi penolakan ditegakkan di lapisan aplikasi.
     *
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function is_referenced(int $id_suplier): bool
    {
        if ($id_suplier <= 0)
            return false;

        $sql =
            'SELECT 1 WHERE '
            . 'EXISTS (SELECT 1 FROM inventori_non_medis.pengadaan_barang WHERE id_suplier = ?) '
            . 'LIMIT 1';

        $result = $this->db->query($sql, [$id_suplier]);
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query is_referenced gagal dieksekusi.');

        return $result->getRowArray() !== null;
    }
}
