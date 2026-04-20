<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateHasilDiagnostikDetailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_diagnostik_detail',
            [
                'id_diagnostik_detail'     => T::ID32(),
                'id_diagnostik'            => T::INT32(),
                'id_parameter_uji'         => T::INT8(),
                'id_nilai_diagnostik'      => T::INT8(),
            ],
            'id_diagnostik_detail',
            [['id_diagnostik', 'id_parameter_uji']],
            [
                ['id_diagnostik', 'hasil_diagnostik', 'id_diagnostik'],
                ['id_parameter_uji', 'parameter_uji', 'id_parameter_uji'],
                ['id_nilai_diagnostik', 'nilai_diagnostik', 'id_nilai_diagnostik'],
            ],
        );
    }
}
