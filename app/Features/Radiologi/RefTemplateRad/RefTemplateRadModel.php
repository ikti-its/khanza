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
            new RefTemplateRadDatabase(),
            [
                'id_template'         => V::DEFAULT(),
                'nama_template'       => V::DEFAULT(),
                'isi_teks_ekspertise' => V::DEFAULT(),
            ],
            [],
        );
    }
}
