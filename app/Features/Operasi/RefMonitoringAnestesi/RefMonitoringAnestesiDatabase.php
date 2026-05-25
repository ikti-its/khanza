<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMonitoringAnestesi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefMonitoringAnestesiDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'operasi',
            'ref_monitoring_anestesi',
            [
                'id_monitoring'   => T::ID(10),
                'nama_monitoring' => T::TEXT(),
            ],
            'id_monitoring',
            [],
            [],
            true,
            'monitoring_anestesi.csv',
        );
    }
}
