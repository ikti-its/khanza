<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMonitoringAnestesi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefMonitoringAnestesiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefMonitoringAnestesiDatabase(),
            [
                'id_monitoring'   => V::DEFAULT(),
                'nama_monitoring' => V::DEFAULT(),
            ],
            [],
        );
    }
}
