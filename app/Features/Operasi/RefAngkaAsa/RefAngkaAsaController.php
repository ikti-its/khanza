<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAngkaAsa;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefAngkaAsaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefAngkaAsaModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Angka ASA', 'ref_angka_asa'],
            ],
            'Referensi Angka ASA',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_asa', 'ID ASA'],
                [SHOW, REQUIRED, I::TEXT, 'nama_asa', 'Nama ASA'],
            ],
        );
    }
}