<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadBhp;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class HasilRadBhpDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'radiologi',
        'hasil_rad_bhp',
        [
            'id_rad_bhp'     => T::ID(100_000_000),
            'id_hasil_rad'   => T::FK_AUTO(),
            // 'id_barang_medis'=> T::FK_AUTO(),
            'jumlah_pakai'   => T::F32(),
            'satuan'         => T::TEXT(),
            'harga_satuan'   => T::MONEY(),
        ],
        'id_rad_bhp',
        [],
        [
            [
                ['id_hasil_rad'],
                \App\Features\Radiologi\HasilRad\HasilRadDatabase::class,
                ['id_hasil_rad']
            ],
            // ['id_barang_medis', 'sik.barang_medis_structure', 'id'],
        ],
    );
}
}
