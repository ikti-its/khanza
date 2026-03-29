<?php

namespace App\Features\Radiolgi\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefItemRadTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'ref_item_rad',
        [
            'id_item'          => T::ID32(),
            'kode_periksa'     => T::TEXT(),
            'nama_pemeriksaan' => T::TEXT(),
            'tarif_dasar'      => T::F32(),
        ],
        ['id_item'],
        [['kode_periksa']],
        [],
        [],
        false,
        __DIR__ . '/item_rad.csv'
    );
}
}
