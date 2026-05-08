<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisDonor;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class MedisDonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'medis_donor',
            'id_medis_donor',
            [
                'id_medis_donor' => V::TODO(),
                'id_pengambilan_darah' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga' => V::TODO()
            ],
        );
    }
}