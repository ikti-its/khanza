<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefStatusPermintaan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefStatusPermintaanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusPermintaanModel(),
            breadcrumbs: [
                ['Laboratorium', 'laboratorium'],
                ['Referensi Status Permintaan', 'ref_status_permintaan'],
            ],
            title: 'Referensi Status Permintaan',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status', 'ID Status'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status', 'Nama Status'],
            ],
        );
    }
}