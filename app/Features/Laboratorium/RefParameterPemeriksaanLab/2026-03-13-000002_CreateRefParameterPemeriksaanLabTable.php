<?php

namespace App\Features\Laboratorium\RefParameterPemeriksaanLab;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefParameterPemeriksaanLabTable extends Template
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
            'nilai_rujukan' => T::TEXT()->nullable(),
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
