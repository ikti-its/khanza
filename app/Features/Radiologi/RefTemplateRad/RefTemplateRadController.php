<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefTemplateRad;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefTemplateRadController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefTemplateRadModel(),
            [
                ['Radiologi', 'radiologi'],
                ['Referensi Template Radiologi', 'ref_template_rad'],
            ],
            'Referensi Template Radiologi',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_template', 'ID Template'],
                [SHOW, REQUIRED, I::TEXT, 'nama_template', 'Nama Template'],
                [SHOW, REQUIRED, I::TEXT, 'isi_teks_ekspertise', 'Isi Teks Ekspertise'],
            ],
        );
    }
}