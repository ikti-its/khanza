<?php
declare(strict_types=1);

namespace App\Features\Person\Agama;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class AgamaController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new AgamaModel(),
            [
                ['Person', 'person'],
                ['Agama', 'agama'],
            ],
            'Agama',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_agama', 'ID Agama'],
                [SHOW, REQUIRED, I::TEXT, 'nama_agama', 'Nama Agama'],
            ],
        );
    }   
}