<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefInduksi;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefInduksiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefInduksiModel(),
            [
                ['Operasi',           'operasi'],
                ['Referensi Induksi', 'ref_induksi'],
            ],
            'Referensi Induksi',
            [
                A::READ,
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_induksi',   'ID Induksi'],
                [SHOW, REQUIRED, I::TEXT,  'nama_induksi', 'Nama Induksi'],
            ],
        );
    }
}
