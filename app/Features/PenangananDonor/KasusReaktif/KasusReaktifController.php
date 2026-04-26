<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktif;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class KasusReaktifController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new KasusReaktifModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Kasus Reaktif', 'icon' => 'kasus_reaktif'],
            ],
            title: 'Kasus Reaktif',
            action: [
                // A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kasus', 'ID Kasus'],
                [SHOW, REQUIRED, I::INDEX, 'id_kunjungan', 'ID Kunjungan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_ditetapkan', 'Tanggal Ditetapkan'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_kasus', 'ID Status Kasus'],
            ],
        );
    }   
}