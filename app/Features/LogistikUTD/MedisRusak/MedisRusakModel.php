<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisRusak;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class MedisRusakModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'medis_rusak',
            'id_medis_rusak',
            [
                'id_medis_rusak' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga_beli' => V::TODO(),
                'id_petugas' => V::TODO(),
                'tanggal_rusak' => V::TODO(),
                'keterangan' => V::TODO()
            ],
        );
    }
}