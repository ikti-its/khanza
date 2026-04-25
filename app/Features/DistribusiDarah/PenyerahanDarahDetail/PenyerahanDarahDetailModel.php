<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarahDetail;
use App\Core\Model\ModelTemplate;

final class PenyerahanDarahDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'distribusi_darah',
            'penyerahan_darah_detail',
            'id_penyerahan_detail',
            [
                'id_penyerahan_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_penyerahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_stok_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'jasa_sarana' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'paket_bhp' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kso' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'manajemen' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                // 'total' => [
                //     'allowed' => false,
                //     'rules'   => '',
                //     'errors'  => [],
                // ]
            ],
        );
    }
}