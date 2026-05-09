<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefParameterPemeriksaanLab;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RefParameterPemeriksaanLabDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'ref_parameter_pemeriksaan_lab',
        [
            'id_parameter'  => T::ID32(100_000),
            'id_item_lab'   => T::FK_AUTO(),
            'nama_parameter'=> T::TEXT(),
            'satuan'        => T::TEXT()->nullable(),
            'nilai_rujukan' => T::TEXT()->nullable(),
            'keterangan'    => T::TEXT()->nullable(),
            'biaya_item'    => T::F32(),
        ],
        'id_parameter',
        [],
        [
            [
                ['id_item_lab'],
                \App\Features\Laboratorium\RefItemPemeriksaanLab\RefItemPemeriksaanLabDatabase::class,
                ['id_item_lab',]
            ],
        ],
        false,
        'parameter_pemeriksaan_lab.csv'
    );
}
}
