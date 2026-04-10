<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;

use App\Core\ModelTemplate;

class PengambilanPenunjangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'logistik_utd',
            'pengambilan_penunjang',
            'id_pengambilan_penunjang',
            [
                'id_pengambilan_penunjang' => [
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
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'harga_beli' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_petugas_gudang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_pengambilan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'keterangan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}