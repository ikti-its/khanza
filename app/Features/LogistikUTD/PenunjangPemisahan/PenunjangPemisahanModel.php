<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangPemisahan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenunjangPemisahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'penunjang_pemisahan',
            'id_penunjang_pemisahan',
            [
                'id_penunjang_pemisahan' => V::TODO(),
                'id_pemisahan' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga' => V::TODO()
            ],
        );
    }
}