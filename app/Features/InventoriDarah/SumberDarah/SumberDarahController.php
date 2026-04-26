<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\SumberDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class SumberDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new SumberDarahModel(),
            breadcrumbs: [
                ['Inventaris Darah', 'inventaris_darah'],
                ['Sumber Darah', 'sumber_darah'],
            ],
            title: 'Sumber Darah',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_sumber_darah', 'ID Sumber Darah'],
                [SHOW, REQUIRED, I::TEXT, 'nama_sumber_darah', 'Nama Sumber Darah'],
            ],
        );
    }   
}