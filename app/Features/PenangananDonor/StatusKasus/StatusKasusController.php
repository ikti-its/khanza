<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusKasus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StatusKasusController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusKasusModel(),
            breadcrumbs: [
                ['Penanganan Donor', 'penanganan_donor'],
                ['Status Kasus', 'status_kasus'],
            ],
            title: 'Status Kasus',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_kasus', 'ID Status Kasus'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_kasus', 'Nama Status Kasus'],
            ],
        );
    }   
}