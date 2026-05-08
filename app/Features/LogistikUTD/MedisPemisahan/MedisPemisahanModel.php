<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisPemisahan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class MedisPemisahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'medis_pemisahan',
            'id_medis_pemisahan',
            [
                'id_medis_pemisahan' => V::TODO(),
                'id_pemisahan' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga' => V::TODO()
            ],
        );
    }
}