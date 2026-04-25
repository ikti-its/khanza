<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TingkatSkala;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class TingkatSkalaController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Tingkat', 'id_tingkat', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Tingkat', 'nama_tingkat', I::TEXT, REQUIRED],
            ],
        );
    }   
}