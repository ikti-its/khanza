<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasiPenunjang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ChecklistPreOperasiPenunjangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'checklist_pre_operasi_penunjang',
            'id_penunjang',
            [
                'id_penunjang' => V::TODO(),
                'id_checklist' => V::TODO(),
                'id_jenis_penunjang' => V::TODO(),
                'id_ketersediaan' => V::TODO(),
                'keterangan' => V::TODO(),
            ],
        );
    }
}