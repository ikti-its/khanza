<?php

namespace App\Features\Laboratorium\RefItemPemeriksaanLab;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateRefItemPemeriksaanLabTable extends Template
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'ref_item_pemeriksaan_lab',
        [
            'id_item_lab'   => T::ID32(),
            'id_kategori'   => T::INT8(),
            'kode_periksa'  => T::TEXT(),
            'nama_item'     => T::TEXT(),
            'tarif'         => T::F32(),
        ],
        ['id_item_lab'],
        [['kode_periksa']],
        [
            [['id_kategori'], 'laboratorium.ref_kategori_lab', ['id_kategori'], 'CASCADE', 'RESTRICT'],
        ],
        [],
        false,
        __DIR__ . '/item_pemeriksaan_lab.csv'
    );
}
}
