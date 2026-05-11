<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAlatAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefAlatAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefAlatAnestesiModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Alat Anestesi', 'ref_alat_anestesi'],
            ],
            'Referensi Alat Anestesi',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_alat', 'ID Alat'],
                [SHOW, REQUIRED, I::TEXT, 'nama_alat', 'Nama Alat'],
            ],
        );
    }
}