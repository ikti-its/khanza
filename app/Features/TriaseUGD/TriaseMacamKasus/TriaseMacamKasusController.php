<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;
use App\Core\Controller\ControllerTemplate;

final class TriaseMacamKasusController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [HIDE, 'ID Macam Kasus', 'id_macam_kasus', 'indeks', OPTIONAL],
                [SHOW, 'Kode', 'kode_macam_kasus', 'teks', REQUIRED],
                [SHOW, 'Nama Macam Kasus', 'nama_macam_kasus', 'teks', REQUIRED],
            ],
        );
    }   
}