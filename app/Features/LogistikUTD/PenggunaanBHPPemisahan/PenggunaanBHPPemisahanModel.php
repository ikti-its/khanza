<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPPemisahan;
use App\Core\Model\ModelTemplate;

final class PenggunaanBHPPemisahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'penggunaan_bhp_pemisahan',
            'id_bhp_pemisahan',
            [
                'id_bhp_pemisahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pemisahan' => [
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