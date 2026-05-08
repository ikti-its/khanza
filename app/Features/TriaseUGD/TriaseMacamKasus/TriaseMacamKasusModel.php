<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TriaseMacamKasusModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'triase_macam_kasus',
            'id_macam_kasus',
            [
                'id_macam_kasus' => V::TODO(),
                'kode_macam_kasus' => V::TODO(),
                'nama_macam_kasus' => V::TODO()
            ],
        );
    }
}