<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RhesusController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new RhesusModel(),
            breadcrumbs: [
                ['Darah', 'darah'],
                ['Rhesus', 'rhesus'],
            ],
            title: 'Rhesus',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_rhesus', 'ID Rhesus'],
                [SHOW, REQUIRED, I::TEXT, 'kode_rhesus', 'Kode Rhesus'],
            ],
        );
    }   
}