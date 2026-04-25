<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\SumberDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class SumberDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new SumberDarahModel(),
            breadcrumbs: [
                ['title' => 'Inventaris Darah', 'icon' => 'inventaris_darah'],
                ['title' => 'Sumber Darah', 'icon' => 'sumber_darah'],
            ],
            judul: 'Sumber Darah',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Sumber Darah', 'id_sumber_darah', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Sumber Darah', 'nama_sumber_darah', I::TEXT, REQUIRED],
            ],
        );
    }   
}