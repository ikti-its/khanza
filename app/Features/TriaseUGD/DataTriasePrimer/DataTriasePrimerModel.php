<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriasePrimer;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class DataTriasePrimerModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'data_triase_primer',
            'id_triase_primer',
            [
                'id_triase_primer' => V::TODO(),
                'id_triase' => V::TODO(),
                'keluhan_utama' => V::TODO(),
                'id_kebutuhan_khusus' => V::TODO(),
                'catatan' => V::TODO(),
                'id_plan_primer' => V::TODO(),
                'tanggal_triase' => V::TODO(),
                'id_petugas' => V::TODO()
            ],
        );
    }
}