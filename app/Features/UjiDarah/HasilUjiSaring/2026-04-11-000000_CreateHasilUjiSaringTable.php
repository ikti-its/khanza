<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateHasilUjiSaringTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_uji_saring',
            [
                'id_uji_saring'         => T::ID32(),
                'id_bag'                => T::INT32(),
                'id_metode_uji'         => T::INT8(),
                'tanggal_uji'           => T::DATE(),
                'id_petugas'            => T::UUID(),
            ],
            'id_uji_saring',
            'id_bag',
            [
                ['id_bag', 'inventori_darah.kantong_darah', 'id_bag'],
                ['id_metode_uji', 'metode_uji', 'id_metode_uji'],
                // ['id_petugas', 'role.petugas', 'id_petugas'],
            ],
            false,
            __DIR__ . '/hasil_uji_saring.csv'
        );
    }
}
