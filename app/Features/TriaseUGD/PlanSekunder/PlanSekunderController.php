<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanSekunder;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PlanSekunderController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PlanSekunderModel(),
            breadcrumbs: [
                ['Triase UGD', 'triase_ugd'],
                ['Plan Sekunder', 'plan_sekunder'],
            ],
            title: 'Plan Sekunder',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_plan_sekunder', 'ID Plan Sekunder'],
                [SHOW, REQUIRED, I::TEXT, 'nama_plan_sekunder', 'Nama Plan Sekunder'],
            ],
        );
    }   
}