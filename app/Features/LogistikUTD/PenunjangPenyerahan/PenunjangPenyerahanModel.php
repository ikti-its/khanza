<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangPenyerahan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenunjangPenyerahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'penunjang_penyerahan',
            'id_penunjang_penyerahan',
            [
                'id_penunjang_penyerahan' => V::TODO(),
                'id_penyerahan' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga' => V::TODO()
            ],
        );
    }
}