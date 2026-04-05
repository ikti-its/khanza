<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateHasilDiagnostikDetailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_diagnostik_detail',
            [
                'id_diagnostik_detail'     => T::ID32(),
                'id_diagnostik'            => T::ID32(),
                'id_parameter_uji'         => T::ID8(),
                'id_nilai_diagnostik'      => T::ID8(),
            ],
            ['id_diagnostik_detail'],
            [['id_diagnostik', 'id_parameter_uji']],
            [
                [['id_diagnostik'], 'hasil_diagnostik', ['id_diagnostik'], 'CASCADE', 'CASCADE'],
                [['id_parameter_uji'], 'parameter_uji', ['id_parameter_uji'], 'CASCADE', 'CASCADE'],
                [['id_nilai_diagnostik'], 'nilai_diagnostik', ['id_nilai_diagnostik'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
