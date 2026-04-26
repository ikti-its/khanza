<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPk;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PermintaanLabPkController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PermintaanLabPkModel(),
            [
                ['Laboratorium', 'laboratorium'],
                ['Permintaan Lab PK', 'permintaan_lab_pk'],
            ],
            'Permintaan Lab PK',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan_pk', 'ID Permintaan PK'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan_lab', 'ID Permintaan Lab'],
                [SHOW, REQUIRED, I::INDEX, 'id_item_pemeriksaan', 'ID Item Pemeriksaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_pemeriksaan', 'ID Parameter Pemeriksaan'],
            ],
        );
    }
}