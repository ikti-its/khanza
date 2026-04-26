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
            title: 'Sumber Darah',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_sumber_darah', 'ID Sumber Darah'],
                [SHOW, REQUIRED, I::TEXT, 'nama_sumber_darah', 'Nama Sumber Darah'],
            ],
        );
    }   
}