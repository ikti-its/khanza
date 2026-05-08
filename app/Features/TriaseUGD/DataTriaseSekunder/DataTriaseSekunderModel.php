<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseSekunder;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class DataTriaseSekunderModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'data_triase_sekunder',
            'id_triase_sekunder',
            [
                'id_triase_sekunder' => V::TODO(),
                'id_triase' => V::TODO(),
                'anamnesa_singkat' => V::TODO(),
                'catatan' => V::TODO(),
                'id_plan_sekunder' => V::TODO(),
                'tanggal_triase' => V::TODO(),
                'id_petugas' => V::TODO()
            ],
        );
    }
}