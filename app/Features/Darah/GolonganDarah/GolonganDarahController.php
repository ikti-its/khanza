<?php
declare(strict_types=1);

namespace App\Features\Darah\GolonganDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class GolonganDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new GolonganDarahModel(),
            breadcrumbs: [
                ['Darah', 'darah'],
                ['Golongan Darah', 'golongan_darah'],
            ],
            title: 'Golongan Darah',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_golongan_darah', 'ID Golongan Darah'],
                [SHOW, REQUIRED, I::TEXT, 'nama_golongan_darah', 'Nama Golongan Darah'],
            ],
        );
    }   
}