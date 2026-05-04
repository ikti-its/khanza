<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanSekunder;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PlanSekunderDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'plan_sekunder',
            [
                'id_plan_sekunder'          => T::ID8(2),
                'nama_plan_sekunder'        => T::TEXT(),
            ],
            'id_plan_sekunder',
            ['nama_plan_sekunder'],
            [],
            true,
            'plan_sekunder.csv'
        );
    }
}
