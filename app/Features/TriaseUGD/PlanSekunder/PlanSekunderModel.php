<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanSekunder;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PlanSekunderModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'triase_ugd',
            'plan_sekunder',
            'id_plan_sekunder',
            [
                'id_plan_sekunder' => V::TODO(),
                'nama_plan_sekunder' => V::TODO()
            ],
        );
    }
}