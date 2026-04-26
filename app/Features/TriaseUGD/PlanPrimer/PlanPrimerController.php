<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanPrimer;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PlanPrimerController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PlanPrimerModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Plan Primer', 'icon' => 'plan_primer'],
            ],
            judul: 'Plan Primer',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_plan_primer', 'ID Plan Primer'],
                [SHOW, REQUIRED, I::TEXT, 'nama_plan_primer', 'Nama Plan Primer'],
            ],
        );
    }   
}