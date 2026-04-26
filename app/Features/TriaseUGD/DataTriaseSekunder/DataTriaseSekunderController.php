<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseSekunder;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class DataTriaseSekunderController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new DataTriaseSekunderModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Data Triase Sekunder', 'icon' => 'data_triase_sekunder'],
            ],
            judul: 'Data Triase Sekunder',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_triase_sekunder', 'ID Triase Sekunder'],
                [SHOW, REQUIRED, I::INDEX, 'id_triase', 'ID Triase'],
                [HIDE, REQUIRED, I::TEXT, 'anamnesa_singkat', 'Anamnesa Singkat'],
                [HIDE, REQUIRED, I::TEXT, 'catatan', 'Catatan'],
                [SHOW, REQUIRED, I::INDEX, 'id_plan_sekunder', 'ID Plan Sekunder'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_triase', 'Tanggal Triase'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
            ],
        );
    }   
}