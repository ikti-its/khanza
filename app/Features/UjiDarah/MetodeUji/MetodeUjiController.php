<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\MetodeUji;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class MetodeUjiController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new MetodeUjiModel(),
            breadcrumbs: [
                ['Uji Darah', 'uji_darah'],
                ['Metode Uji', 'metode_uji'],
            ],
            title: 'Metode Uji',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_metode_uji', 'ID Metode Uji'],
                [SHOW, REQUIRED, I::TEXT, 'nama_metode', 'Nama Metode'],
            ],
        );
    }   
}