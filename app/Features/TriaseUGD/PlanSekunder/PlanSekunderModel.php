<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanSekunder;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PlanSekunderModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PlanSekunderDatabase(),
            [
                'id_plan_sekunder'   => V::DEFAULT(),
                'nama_plan_sekunder' => V::DEFAULT(),
            ],
            [],
        );
    }
}
