<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarangDetail;

use App\Core\ModelTemplate;

final class PermintaanBarangDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'permintaan_barang_detail',
            'id_detail',
            [
                'id_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_permintaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_barang' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_barang_baru' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'qty' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'qty_disetujui' => [
                    'allowed' => true,
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
