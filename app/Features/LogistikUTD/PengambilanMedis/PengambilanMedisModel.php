<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;

use App\Core\ModelTemplate;

class PengambilanMedisModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'logistik_utd',
            'pengambilan_medis',
            'id_pengambilan_medis',
            [
                'id_pengambilan_medis' => [
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
                'nama_bangsal' => [
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
                ],
                'nomor_batch' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nomor_faktur' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}