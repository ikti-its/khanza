<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteRespirasi;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefAldretteRespirasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefAldretteRespirasiModel(),
            [
                ['Operasi',                      'operasi'],
                ['Referensi Aldrette Respirasi', 'ref_aldrette_respirasi'],
            ],
            'Referensi Aldrette Respirasi',
            [
                A::READ,
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX,  'id_respirasi', 'ID Respirasi'],
                [SHOW, REQUIRED, I::TEXT,   'nama_skala',   'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai',        'Nilai'],
            ],
        );
    }
}
