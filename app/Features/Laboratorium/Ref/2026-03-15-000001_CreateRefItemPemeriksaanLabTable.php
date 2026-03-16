<?php

namespace App\Features\Laboratorium\Ref;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;
    
class CreateRefItemPemeriksaanLabTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'ref_item_pemeriksaan_lab',
        [
            'id_item_lab'   => T::ID32(),
            'id_kategori'   => T::ID8(),
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
        true,
        __DIR__ . '/item_pemeriksaan_lab.csv'
    );
}
}
