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
                [HIDE, 'ID Triase Primer', 'id_triase_primer', I::INDEX, OPTIONAL],
                [SHOW, 'ID Triase', 'id_triase', I::INDEX, REQUIRED],
                [HIDE, 'Keluhan Utama', 'keluhan_utama', I::TEXT, REQUIRED],
                [HIDE, 'ID Kebutuhan Khusus', 'id_kebutuhan_khusus', I::INDEX, REQUIRED],
                [HIDE, 'Catatan', 'catatan', I::TEXT, REQUIRED],
                [SHOW, 'ID Plan Primer', 'id_plan_primer', I::INDEX, REQUIRED],
                [SHOW, 'Tanggal Triase', 'tanggal_triase', 'tanggal_jam', REQUIRED],
                [SHOW, 'ID Petugas', 'id_petugas', I::INDEX, REQUIRED],
            ],
        );
    }   
}