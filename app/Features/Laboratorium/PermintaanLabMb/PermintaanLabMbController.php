<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabMb;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PermintaanLabMbController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PermintaanLabMbModel(),
            [
                ['Laboratorium', 'laboratorium'],
                ['Permintaan Lab MB', 'permintaan_lab_mb'],
            ],
            'Permintaan Lab MB',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan_mb', 'ID Permintaan MB'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan_lab', 'ID Permintaan Lab'],
                [SHOW, REQUIRED, I::INDEX, 'id_item_pemeriksaan', 'ID Item Pemeriksaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_pemeriksaan', 'ID Parameter Pemeriksaan'],
            ],
        );
    }
}