<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopPenunjang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ChecklistPostopPenunjangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'checklist_postop_penunjang',
            'id_checklist_post',
            [
                'id_penunjang' => V::TODO(),
                'id_checklist_post' => V::TODO(),
                'id_jenis_penunjang' => V::TODO(),
                'id_ketersediaan' => V::TODO(),
                'keterangan' => V::TODO(),
            ],
        );
    }
}