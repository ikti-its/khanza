<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanPrimer;
use App\Core\Model\ModelTemplate;

final class PlanPrimerModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'triase_ugd',
            'plan_primer',
            'id_plan_primer',
            [
                'id_plan_primer' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_plan_primer' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}