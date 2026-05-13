<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisPenyerahan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class MedisPenyerahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new MedisPenyerahanDatabase(),
            'BASE',
            'logistik_utd',
            'medis_penyerahan',
            'id_medis_penyerahan',
            [
                'id_medis_penyerahan'   => V::DEFAULT(),
                'jumlah'                => V::DEFAULT(),
                'harga'                 => V::DEFAULT()
            ],
            [
                'id_penyerahan' => ['no_penyerahan'],
                'id_barang'     => ['kode_barang', 'nama']
            ],
        );
    }
}