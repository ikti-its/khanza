<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Konseling;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class KonselingController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new KonselingModel(),
            [
                ['Penanganan Donor', 'penanganan_donor'],
                ['Konseling', 'konseling'],
            ],
            'Konseling',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_konseling', 'ID Konseling'],
                [SHOW, REQUIRED, I::INDEX, 'id_kasus', 'ID Kasus'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_konseling', 'Tanggal Konseling'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
            ],
        );
    }   
}