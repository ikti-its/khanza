<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanPrimer;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PlanPrimerDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'plan_primer',
            [
                'id_plan_primer'          => T::ID8(2),
                'nama_plan_primer'        => T::TEXT(),
            ],
            'id_plan_primer',
            ['nama_plan_primer'],
            [],
            true,
            'plan_primer.csv'
        );
    }
}
