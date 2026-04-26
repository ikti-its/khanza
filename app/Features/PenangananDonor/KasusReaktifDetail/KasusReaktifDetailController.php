<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktifDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class KasusReaktifDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new KasusReaktifDetailModel(),
            [
                ['Penanganan Donor', 'penanganan_donor'],
                ['Kasus Reaktif Detail', 'kasus_reaktif_detail'],
            ],
            'Kasus Reaktif Detail',
            [
                // A::CREATE,
                A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_kasus_detail', 'ID Kasus Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_kasus', 'ID Kasus'],
                [SHOW, REQUIRED, I::INDEX, 'id_uji_saring_detail', 'ID Uji Saring Detail'],
            ],
        );
    }   
}