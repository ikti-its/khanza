<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateHasilUjiSaringTable extends Template
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_uji_saring',
            [
                'id_uji_saring'         => T::ID32(),
                'id_bag'                => T::INT32(),
                'id_metode_uji'         => T::INT8(),
                'tanggal_uji'           => T::DATETIME(),
                'id_petugas'            => T::INT32(),
            ],
            ['id_uji_saring'],
            [['id_bag']],
            [
                [['id_bag'], 'inventori_darah.kantong_darah', ['id_bag'], 'CASCADE', 'CASCADE'],
                [['id_metode_uji'], 'metode_uji', ['id_metode_uji'], 'CASCADE', 'CASCADE'],
                // [['id_petugas'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
