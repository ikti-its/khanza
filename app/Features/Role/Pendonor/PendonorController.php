<?php
declare(strict_types=1);

namespace App\Features\Role\Pendonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PendonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PendonorModel(),
            [
                ['Role', 'role'],
                ['Pendonor', 'pendonor'],
            ],
            'Pendonor',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_pendonor', 'ID Pendonor'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_pendonor', 'Nomor Pendonor'],
                [SHOW, REQUIRED, I::INDEX, 'id_orang', 'ID Orang'],
                [SHOW, REQUIRED, I::INDEX, 'id_rhesus', 'ID Rhesus'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_pendonor', 'ID Status Pendonor'],
            ],
        );
    }   
}