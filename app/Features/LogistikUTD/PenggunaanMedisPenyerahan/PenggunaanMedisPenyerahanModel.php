<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanMedisPenyerahan;
use App\Core\Model\ModelTemplate;

final class PenggunaanMedisPenyerahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'penggunaan_medis_penyerahan',
            'id_medis_penyerahan',
            [
                'id_medis_penyerahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_penyerahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_barang' => [
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