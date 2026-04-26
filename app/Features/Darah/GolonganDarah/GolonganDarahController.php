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
                [HIDE, OPTIONAL, I::INDEX, 'id_golongan_darah', 'ID Golongan Darah'],
                [SHOW, REQUIRED, I::TEXT, 'nama_golongan_darah', 'Nama Golongan Darah'],
            ],
        );
    }   
}