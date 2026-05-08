<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarahDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenyerahanDarahDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'distribusi_darah',
            'penyerahan_darah_detail',
            'id_penyerahan_detail',
            [
                'id_penyerahan_detail' => V::TODO(),
                'id_penyerahan' => V::TODO(),
                'id_stok_darah' => V::TODO(),
                'jasa_sarana' => V::TODO(),
                'paket_bhp' => V::TODO(),
                'kso' => V::TODO(),
                'manajemen' => V::TODO(),
                // 'total' => [
                //     'allowed' => false,
                //     'rules'   => '',
                //     'errors'  => [],
                // ]
            ],
        );
    }
}