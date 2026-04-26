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
                [HIDE, OPTIONAL, I::INDEX, 'id_parameter_uji', 'ID Parameter Uji'],
                [SHOW, REQUIRED, I::TEXT, 'nama_parameter', 'Nama Parameter'],
            ],
        );
    }   
}