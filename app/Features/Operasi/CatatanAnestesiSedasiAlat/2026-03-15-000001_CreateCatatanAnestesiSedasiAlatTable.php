<?php

namespace App\Features\Operasi\CatatanAnestesiSedasiAlat;

use App\Core\Database\Template;
use App\Core\Database\Type as T;
    
class CreateCatatanAnestesiSedasiAlatTable extends Template
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'catatan_anestesi_sedasi_alat',
        [
            'id_alat'             => T::ID8(),
            'id_catatan_anestesi' => T::ID8(),
            'nama_alat'           => T::TEXT(),
            'is_digunakan'        => T::BOOL(),
            'keterangan'          => T::TEXT(),
        ],
        ['id_alat'],
        [],
        [
            [['id_catatan_anestesi'], 'operasi.catatan_anestesi_sedasi', ['id_catatan_anestesi'], 'CASCADE', 'CASCADE'],
        ],
        [['id_catatan_anestesi']]
    );
}
}
