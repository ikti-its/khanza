<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusPencekalan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StatusPencekalanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusPencekalanModel(),
            breadcrumbs: [
                ['Penanganan Donor', 'penanganan_donor'],
                ['Status Pencekalan', 'status_pencekalan'],
            ],
            title: 'Status Pencekalan',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_pencekalan', 'ID Status Pencekalan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_pencekalan', 'Nama Status Pencekalan'],
            ],
        );
    }   
}