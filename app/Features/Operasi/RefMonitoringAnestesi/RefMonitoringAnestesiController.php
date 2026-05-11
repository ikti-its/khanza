<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMonitoringAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefMonitoringAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefMonitoringAnestesiModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Monitoring Anestesi', 'ref_monitoring_anestesi'],
            ],
            'Referensi Monitoring Anestesi',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_monitoring', 'ID Monitoring'],
                [SHOW, REQUIRED, I::TEXT, 'nama_monitoring', 'Nama Monitoring'],
            ],
        );
    }
}