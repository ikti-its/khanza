<?php
declare(strict_types=1);

namespace App\Features\Person\Pernikahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PernikahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PernikahanModel(),
            [
                ['Person', 'person'],
                ['Pernikahan', 'pernikahan'],
            ],
            'Pernikahan',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_pernikahan', 'ID Pernikahan'],
                [SHOW, REQUIRED, I::TEXT, 'status_pernikahan', 'Status Pernikahan'],
            ],
        );
    }   
}