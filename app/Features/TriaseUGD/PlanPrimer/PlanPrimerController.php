<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanPrimer;
use App\Core\Controller\ControllerTemplate;

class PlanPrimerController extends ControllerTemplate
{
    public function __construct(
    ){
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
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Plan Primer', 'id_plan_primer', 'indeks', 0],
                [1, 'Nama Plan Primer', 'nama_plan_primer', 'teks', 1],
            ],
        );
    }   
}