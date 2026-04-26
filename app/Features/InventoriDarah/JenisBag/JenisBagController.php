<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\JenisBag;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

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
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_bag', 'ID Jenis Bag'],
                [SHOW, REQUIRED, I::TEXT, 'kode_jenis_bag', 'Kode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis_bag', 'Nama Jenis Bag'],
            ],
        );
    }   
}