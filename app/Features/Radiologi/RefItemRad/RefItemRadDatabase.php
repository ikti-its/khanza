<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefItemRad;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
final class RefItemRadDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'ref_item_rad',
        [
            'id_item'          => T::ID32(100_000),
            'kode_periksa'     => T::TEXT(),
            'nama_pemeriksaan' => T::TEXT(),
            'tarif_dasar'      => T::F32(),
        ],
        'id_item',
        ['kode_periksa'],
        [],
        false,
        'item_rad.csv'
    );
}
}
