<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarahDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanDarahDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'distribusi_darah',
            'permintaan_darah_detail',
            'id_permintaan_detail',
            [
                'id_permintaan_detail' => V::TODO(),
                'id_permintaan' => V::TODO(),
                'id_komponen' => V::TODO(),
                'id_golongan_darah' => V::TODO(),
                'id_rhesus' => V::TODO(),
                'jumlah' => V::TODO()
            ],
        );
    }
}