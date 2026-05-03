<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostik;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class HasilDiagnostikDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'hasil_diagnostik',
            [
                'id_diagnostik'          => T::ID32(5_000_000),
                'id_rujukan'             => T::FK_AUTO(),
                'tanggal_hasil'          => T::DATE(),
                'dokter_pemeriksa'       => T::TEXT(),
            ],
            'id_diagnostik',
            ['id_rujukan'],
            [
                [
                    'id_rujukan', 
                    \App\Features\PenangananDonor\Rujukan\RujukanDatabase::class, 
                    'id_rujukan'
                ],
            ],
        );
    }
}
