<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefTemplateRad;

use App\Core\ModelTemplate;

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
                'id_template' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_template' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'isi_teks_ekspertise' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}