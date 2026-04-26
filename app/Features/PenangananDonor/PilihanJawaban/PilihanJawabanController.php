<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PilihanJawabanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new PilihanJawabanModel(),
            [
                ['Penanganan Donor', 'penanganan_donor'],
                ['Pilihan Jawaban', 'pilihan_jawaban'],
            ],
            'Pilihan Jawaban',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_pilihan', 'ID Pilihan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_pilihan', 'Nama Pilihan'],
            ],
        );
    }   
}