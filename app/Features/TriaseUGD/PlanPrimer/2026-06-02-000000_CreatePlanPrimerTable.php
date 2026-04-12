<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanPrimer;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePlanPrimerTable extends Template
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'plan_primer',
            [
                'id_plan_primer'          => T::ID8(),
                'nama_plan_primer'        => T::TEXT(),
            ],
            ['id_plan_primer'],
            [['nama_plan_primer']],
            [],
            [],
            true,
            __DIR__ . '/plan_primer.csv'
        );
    }
}
