<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PertanyaanKonseling;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PertanyaanKonselingController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PertanyaanKonselingModel(),
            breadcrumbs: [
                ['Penanganan Donor', 'penanganan_donor'],
                ['Pertanyaan Konseling', 'pertanyaan_konseling'],
            ],
            title: 'Pertanyaan Konseling',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pertanyaan', 'ID Pertanyaan'],
                [SHOW, REQUIRED, I::TEXT, 'teks_pertanyaan', 'Teks Pertanyaan'],
            ],
        );
    }   
}