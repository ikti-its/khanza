<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefTemplateRad;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefTemplateRadModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'radiologi',
            'ref_template_rad',
            'id_template',
            [
                'id_template' => V::TODO(),
                'nama_template' => V::TODO(),
                'isi_teks_ekspertise' => V::TODO(),
            ],
        );
    }
}