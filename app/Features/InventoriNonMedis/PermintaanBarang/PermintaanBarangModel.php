<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;

use App\Core\ModelTemplate;

final class PermintaanBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'permintaan_barang',
            'id_permintaan',
            [
                'id_permintaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'unit_pemohon' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tipe' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'status' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'catatan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
