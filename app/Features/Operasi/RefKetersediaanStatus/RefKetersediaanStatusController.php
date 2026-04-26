<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKetersediaanStatus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefKetersediaanStatusController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKetersediaanStatusModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Ketersediaan Status', 'ref_ketersediaan_status'],
            ],
            title: 'Referensi Ketersediaan Status',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_ketersediaan_status', 'ID Ketersediaan Status'],
                [SHOW, REQUIRED, I::TEXT, 'nama_ketersediaan', 'Nama Ketersediaan'],
            ],
        );
    }
}