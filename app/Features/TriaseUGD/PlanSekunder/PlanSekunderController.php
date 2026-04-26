<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanSekunder;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PlanSekunderController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PlanSekunderModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Plan Sekunder', 'icon' => 'plan_sekunder'],
            ],
            judul: 'Plan Sekunder',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_plan_sekunder', 'ID Plan Sekunder'],
                [SHOW, REQUIRED, I::TEXT, 'nama_plan_sekunder', 'Nama Plan Sekunder'],
            ],
        );
    }   
}