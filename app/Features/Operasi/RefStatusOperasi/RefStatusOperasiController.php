<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefStatusOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStatusOperasiModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Status Operasi', 'ref_status_operasi'],
            ],
            'Referensi Status Operasi',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_status', 'ID Status'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status', 'Nama Status'],
            ],
        );
    }
}