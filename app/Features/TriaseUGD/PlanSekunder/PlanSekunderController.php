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
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Plan Sekunder', 'icon' => 'plan_sekunder'],
            ],
            title: 'Plan Sekunder',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_plan_sekunder', 'ID Plan Sekunder'],
                [SHOW, REQUIRED, I::TEXT, 'nama_plan_sekunder', 'Nama Plan Sekunder'],
            ],
        );
    }   
}