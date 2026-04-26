<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JenisPencekalan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class JenisPencekalanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new JenisPencekalanModel(),
            breadcrumbs: [
                ['Penanganan Donor', 'penanganan_donor'],
                ['Jenis Pencekalan', 'jenis_pencekalan'],
            ],
            title: 'Jenis Pencekalan',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_pencekalan', 'ID Jenis Pencekalan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis_pencekalan', 'Nama Jenis Pencekalan'],
            ],
        );
    }   
}