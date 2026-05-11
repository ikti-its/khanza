<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMonitoringAnestesi;
use App\Core\Model\ModelTemplate;

final class RefMonitoringAnestesiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_monitoring_anestesi',
            'id_monitoring',
            [
                'id_monitoring' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_monitoring' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}