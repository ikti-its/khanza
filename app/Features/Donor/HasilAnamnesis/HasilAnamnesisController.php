<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilAnamnesisController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new HasilAnamnesisModel(),
            [
                ['Donor',           'donor'],
                ['Hasil Anamnesis', 'hasil_anamnesis'],
            ],
            'Hasil Anamnesis',
            [
                A::READ,
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_hasil',   'ID Hasil'],
                [SHOW, REQUIRED, I::TEXT,  'nama_hasil', 'Nama Hasil'],
            ],
        );
    }
}
