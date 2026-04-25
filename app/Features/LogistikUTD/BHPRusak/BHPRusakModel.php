<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\BHPRusak;
use App\Core\Model\ModelTemplate;

final class BHPRusakModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'bhp_rusak',
            'id_bhp_rusak',
            [
                'id_bhp_rusak' => [
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
                'harga_beli' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_petugas' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_rusak' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'keterangan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}