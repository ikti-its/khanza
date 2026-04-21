<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TingkatSkala;
use App\Core\Controller\ControllerTemplate;

class TingkatSkalaController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new TingkatSkalaModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Tingkat Skala', 'icon' => 'tingkat_skala'],
            ],
            judul: 'Tingkat Skala',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Tingkat', 'id_tingkat', 'indeks', 0],
                [1, 'Nama Tingkat', 'nama_tingkat', 'teks', 1],
            ],
        );
    }   
}