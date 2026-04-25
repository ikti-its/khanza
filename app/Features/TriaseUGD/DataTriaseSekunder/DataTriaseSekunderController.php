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
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Triase Sekunder', 'id_triase_sekunder', I::INDEX, OPTIONAL],
                [SHOW, 'ID Triase', 'id_triase', I::INDEX, REQUIRED],
                [HIDE, 'Anamnesa Singkat', 'anamnesa_singkat', I::TEXT, REQUIRED],
                [HIDE, 'Catatan', 'catatan', I::TEXT, REQUIRED],
                [SHOW, 'ID Plan Sekunder', 'id_plan_sekunder', I::INDEX, REQUIRED],
                [SHOW, 'Tanggal Triase', 'tanggal_triase', 'tanggal_jam', REQUIRED],
                [SHOW, 'ID Petugas', 'id_petugas', I::INDEX, REQUIRED],
            ],
        );
    }   
}