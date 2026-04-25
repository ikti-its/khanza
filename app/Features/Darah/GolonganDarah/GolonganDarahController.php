<?php
declare(strict_types=1);

namespace App\Features\Darah\GolonganDarah;
use App\Core\Controller\ControllerTemplate;

final class GolonganDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new GolonganDarahModel(),
            breadcrumbs: [
                ['title' => 'Darah', 'icon' => 'darah'],
                ['title' => 'Golongan Darah', 'icon' => 'golongan_darah'],
            ],
            judul: 'Golongan Darah',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Golongan Darah', 'id_golongan_darah', 'indeks', OPTIONAL],
                [SHOW, 'Nama Golongan Darah', 'nama_golongan_darah', 'teks', REQUIRED],
            ],
        );
    }   
}