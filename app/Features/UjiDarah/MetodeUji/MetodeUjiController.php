<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\MetodeUji;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class MetodeUjiController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new MetodeUjiModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Metode Uji', 'icon' => 'metode_uji'],
            ],
            judul: 'Metode Uji',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Metode Uji', 'id_metode_uji', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Metode', 'nama_metode', I::TEXT, REQUIRED],
            ],
        );
    }   
}