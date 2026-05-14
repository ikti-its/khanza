<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanPrimer;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PlanPrimerModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PlanPrimerDatabase(),
            'REFS',
            'triase_ugd',
            'plan_primer',
            'id_plan_primer',
            [
                'id_plan_primer'    => V::DEFAULT(),
                'nama_plan_primer'  => V::DEFAULT()
            ],
            [],
        );
    }
}