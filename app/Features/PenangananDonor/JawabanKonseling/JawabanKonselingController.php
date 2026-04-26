<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JawabanKonseling;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class JawabanKonselingController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new JawabanKonselingModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Jawaban Konseling', 'icon' => 'jawaban_konseling'],
            ],
            title: 'Jawaban Konseling',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jawaban', 'ID Jawaban'],
                [SHOW, REQUIRED, I::INDEX, 'id_konseling', 'ID Konseling'],
                [SHOW, REQUIRED, I::INDEX, 'id_pertanyaan', 'ID Pertanyaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_pilihan', 'ID Pilihan Jawaban'],
            ],
        );
    }   
}