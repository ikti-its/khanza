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
            title: 'Metode Uji',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_metode_uji', 'ID Metode Uji'],
                [SHOW, REQUIRED, I::TEXT, 'nama_metode', 'Nama Metode'],
            ],
        );
    }   
}