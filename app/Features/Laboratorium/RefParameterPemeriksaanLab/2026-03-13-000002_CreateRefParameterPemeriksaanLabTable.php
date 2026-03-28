<?php

namespace App\Features\Laboratorium\RefParameterPemeriksaanLab;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefParameterPemeriksaanLabTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'ref_parameter_pemeriksaan_lab',
        [
            'id_parameter'  => T::ID32(),
            'id_item_lab'   => T::ID32(),
            'nama_parameter'=> T::TEXT(),
            'satuan'        => T::TEXT()->nullable(),
            'nilai_rujukan' => T::TEXT(),
            'keterangan'    => T::TEXT()->nullable(),
            'biaya_item'    => T::F32(),
        ],
        ['id_parameter'],
        [],
        [
            [['id_item_lab'], 'laboratorium.ref_item_pemeriksaan_lab', ['id_item_lab'], 'CASCADE', 'RESTRICT'],
        ],
        [],
        false,
        __DIR__ . '/parameter_pemeriksaan_lab.csv'
    );
}
}
