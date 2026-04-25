<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\PlanSekunder;
use App\Core\Controller\ControllerTemplate;

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
                [HIDE, 'ID Plan Sekunder', 'id_plan_sekunder', 'indeks', OPTIONAL],
                [SHOW, 'Nama Plan Sekunder', 'nama_plan_sekunder', 'teks', REQUIRED],
            ],
        );
    }   
}