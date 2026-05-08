<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisPenyerahan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class MedisPenyerahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'medis_penyerahan',
            'id_medis_penyerahan',
            [
                'id_medis_penyerahan' => V::TODO(),
                'id_penyerahan' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga' => V::TODO()
            ],
        );
    }
}