<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardRespirasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefStewardRespirasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefStewardRespirasiModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Steward Respirasi', 'ref_steward_respirasi'],
            ],
            'Referensi Steward Respirasi',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_respirasi', 'ID Respirasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}