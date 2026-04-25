<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\SumberDarah;
use App\Core\Controller\ControllerTemplate;

final class SumberDarahController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Sumber Darah', 'id_sumber_darah', 'indeks', 0],
                [1, 'Nama Sumber Darah', 'nama_sumber_darah', 'teks', 1],
            ],
        );
    }   
}