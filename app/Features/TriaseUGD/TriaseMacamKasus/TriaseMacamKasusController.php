<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class TriaseMacamKasusController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new TriaseMacamKasusModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Triase Macam Kasus', 'icon' => 'triase_macam_kasus'],
            ],
            judul: 'Triase Macam Kasus',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, OPTIONAL, I::INDEX, 'id_macam_kasus', 'ID Macam Kasus'],
                [SHOW, REQUIRED, I::TEXT, 'kode_macam_kasus', 'Kode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_macam_kasus', 'Nama Macam Kasus'],
            ],
        );
    }   
}