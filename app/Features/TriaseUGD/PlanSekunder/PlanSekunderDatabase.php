<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanSekunder;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PlanSekunderDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'plan_sekunder',
            [
                'id_plan_sekunder'   => T::ID(5),
                'nama_plan_sekunder' => T::NAME(20),
            ],
            'id_plan_sekunder',
            ['nama_plan_sekunder'],
            [],
            true,
            'plan_sekunder.csv'
        );
    }
}
