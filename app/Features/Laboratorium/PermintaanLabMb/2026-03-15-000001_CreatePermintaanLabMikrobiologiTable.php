<?php

namespace App\Features\Laboratorium\PermintaanLabMb;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;
    
class CreatePermintaanLabMikrobiologiTable extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'laboratorium',
        'permintaan_lab_mb',
        [
            'id_permintaan_mb'          => T::ID32(),
            'id_permintaan_lab'         => T::INT64(),
            'id_item_pemeriksaan'       => T::INT32(),
            'id_parameter_pemeriksaan'  => T::INT32(),
        ],
        ['id_permintaan_mb'],
        [],
        [
            [['id_permintaan_lab'], 'laboratorium.permintaan_lab_header', ['id_permintaan'], 'CASCADE', 'CASCADE'],
            [['id_item_pemeriksaan'], 'laboratorium.ref_item_pemeriksaan_lab', ['id_item_lab'], 'CASCADE', 'RESTRICT'],
            [['id_parameter_pemeriksaan'], 'laboratorium.ref_parameter_pemeriksaan_lab', ['id_parameter'], 'CASCADE', 'RESTRICT'],
        ],
        [['id_permintaan_lab']]
    );
}
}
