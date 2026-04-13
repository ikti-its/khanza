<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaringDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateHasilUjiSaringDetailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_uji_saring_detail',
            [
                'id_uji_saring_detail'      => T::ID32(),
                'id_uji_saring'             => T::INT32(),
                'id_parameter_uji'          => T::INT8(),
                'id_nilai_saring'           => T::INT8(),
                'nilai_absorbance'          => T::F32()->nullable(),
            ],
            ['id_uji_saring_detail'],
            [['id_uji_saring', 'id_parameter_uji']],
            [
                [['id_uji_saring'], 'hasil_uji_saring', ['id_uji_saring'], 'CASCADE', 'CASCADE'],
                [['id_parameter_uji'], 'parameter_uji', ['id_parameter_uji'], 'CASCADE', 'CASCADE'],
                [['id_nilai_saring'], 'nilai_saring', ['id_nilai_saring'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
