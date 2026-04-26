<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\JenisBag;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class JenisBagController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new JenisBagModel(),
            breadcrumbs: [
                ['title' => 'Inventaris Darah', 'icon' => 'inventaris_darah'],
                ['title' => 'Jenis Bag', 'icon' => 'jenis_bag'],
            ],
            title: 'Jenis Bag',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_bag', 'ID Jenis Bag'],
                [SHOW, REQUIRED, I::TEXT, 'kode_jenis_bag', 'Kode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis_bag', 'Nama Jenis Bag'],
            ],
        );
    }   
}