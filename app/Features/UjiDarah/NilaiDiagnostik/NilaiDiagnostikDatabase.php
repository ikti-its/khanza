<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiDiagnostik;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class NilaiDiagnostikDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'nilai_diagnostik',
            [
                'id_nilai_diagnostik'      => T::ID8(2),
                'nama_nilai_diagnostik'    => T::TEXT(),
            ],
            'id_nilai_diagnostik',
            ['nama_nilai_diagnostik'],
            [],
            true,
            'nilai_diagnostik.csv'
        );
    }
}
