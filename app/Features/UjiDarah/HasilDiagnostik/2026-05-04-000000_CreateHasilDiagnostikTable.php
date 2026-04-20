<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostik;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateHasilDiagnostikTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_diagnostik',
            [
                'id_diagnostik'          => T::ID32(),
                'id_rujukan'             => T::INT32(),
                'tanggal_hasil'          => T::DATE(),
                'dokter_pemeriksa'       => T::TEXT(),
            ],
            ['id_diagnostik'],
            [['id_rujukan']],
            [
                [['id_rujukan'], 'penanganan_donor.rujukan', ['id_rujukan'], 'CASCADE', 'CASCADE'],
            ],
        );
    }
}
