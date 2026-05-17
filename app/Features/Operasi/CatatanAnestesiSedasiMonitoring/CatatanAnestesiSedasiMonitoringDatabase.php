<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiMonitoring;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class CatatanAnestesiSedasiMonitoringDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'catatan_anestesi_sedasi_monitoring',
        [
            'id_monitoring_catatan'     => T::ID32(300_000_000),
            'id_catatan_anestesi'       => T::FK_AUTO(),
            'id_monitoring'             => T::FK_AUTO(),
            'is_digunakan'              => T::BOOL(),
            'keterangan'                => T::TEXT()->nullable(),
        ],
        'id_monitoring_catatan',
        [],
        [
            [
                ['id_catatan_anestesi'],
                \App\Features\Operasi\CatatanAnestesiSedasi\CatatanAnestesiSedasiDatabase::class,
                ['id_catatan_anestesi'],
            ],
            [
                ['id_monitoring'],
                \App\Features\Operasi\RefMonitoringAnestesi\RefMonitoringAnestesiDatabase::class,
                ['id_monitoring'],
            ],
        ],
    );
}
}
