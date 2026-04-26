<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefStatusPermintaanRad;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefStatusPermintaanRadController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStatusPermintaanRadModel(),
            [
                ['Radiologi', 'radiologi'],
                ['Referensi Status Permintaan Radiologi', 'ref_status_permintaan_rad'],
            ],
            'Referensi Status Permintaan Radiologi',
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