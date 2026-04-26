<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriasePrimer;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class DataTriasePrimerController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new DataTriasePrimerModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Data Triase Primer', 'icon' => 'data_triase_primer'],
            ],
            judul: 'Data Triase Primer',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_triase_primer', 'ID Triase Primer'],
                [SHOW, REQUIRED, I::INDEX, 'id_triase', 'ID Triase'],
                [HIDE, REQUIRED, I::TEXT, 'keluhan_utama', 'Keluhan Utama'],
                [HIDE, REQUIRED, I::INDEX, 'id_kebutuhan_khusus', 'ID Kebutuhan Khusus'],
                [HIDE, REQUIRED, I::TEXT, 'catatan', 'Catatan'],
                [SHOW, REQUIRED, I::INDEX, 'id_plan_primer', 'ID Plan Primer'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_triase', 'Tanggal Triase'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
            ],
        );
    }   
}