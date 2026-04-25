<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\ParameterUji;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class ParameterUjiController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new ParameterUjiModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Parameter Uji', 'icon' => 'parameter_uji'],
            ],
            judul: 'Parameter Uji',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Parameter Uji', 'id_parameter_uji', 'indeks', OPTIONAL],
                [SHOW, 'Nama Parameter', 'nama_parameter', 'teks', REQUIRED],
            ],
        );
    }   
}