<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangDonor;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenunjangDonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'penunjang_donor',
            'id_penunjang_donor',
            [
                'id_penunjang_donor' => V::TODO(),
                'id_pengambilan_darah' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga' => V::TODO()
            ],
        );
    }
}