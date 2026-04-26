<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanPrimer;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PlanPrimerController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PlanPrimerModel(),
            [
                ['Triase UGD', 'triase_ugd'],
                ['Plan Primer', 'plan_primer'],
            ],
            'Plan Primer',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_plan_primer', 'ID Plan Primer'],
                [SHOW, REQUIRED, I::TEXT, 'nama_plan_primer', 'Nama Plan Primer'],
            ],
        );
    }   
}