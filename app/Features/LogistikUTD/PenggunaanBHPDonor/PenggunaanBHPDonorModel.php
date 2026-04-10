<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPDonor;

use App\Core\ModelTemplate;

class PenggunaanBHPDonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'penggunaan_bhp_donor',
            'id_bhp_donor',
            [
                'id_bhp_donor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pengambilan_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_jenis_bhp' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_barang_medis' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_barang_penunjang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'jumlah' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'harga' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}