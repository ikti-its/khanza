<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanSekunder;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePlanSekunderTable extends Template
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'plan_sekunder',
            [
                'id_plan_sekunder'          => T::ID8(),
                'nama_plan_sekunder'        => T::TEXT(),
            ],
            ['id_plan_sekunder'],
            [['nama_plan_sekunder']],
            [],
            [],
            true,
            __DIR__ . '/plan_sekunder.csv'
        );
    }
}
