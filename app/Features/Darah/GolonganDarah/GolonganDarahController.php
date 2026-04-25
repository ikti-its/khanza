<?php
declare(strict_types=1);

namespace App\Features\Darah\GolonganDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Golongan Darah', 'id_golongan_darah', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Golongan Darah', 'nama_golongan_darah', I::TEXT, REQUIRED],
            ],
        );
    }   
}