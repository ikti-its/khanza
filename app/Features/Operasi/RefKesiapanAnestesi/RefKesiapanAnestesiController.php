<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesiapanAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefKesiapanAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKesiapanAnestesiModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Kesiapan Anestesi', 'ref_kesiapan_anestesi'],
            ],
            title: 'Referensi Kesiapan Anestesi',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesiapan', 'ID Kesiapan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kesiapan', 'Nama Kesiapan'],
            ],
        );
    }
}