<?php

namespace App\Features\AturanPenggajian\PajakPenghasilan21;

use App\Core\MigrationTemplate;
use App\Core\DBType as T;

class CreatePajakPenghasilan21Table extends MigrationTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'pph21',
            [
                'no_pph21'    => T::ID8(),
                'pkp_bawah'   => T::INT32(),
                'pkp_atas'    => T::INT64(),
                'tarif_pajak' => T::F32(),
            ],
            ['no_pph21'],
            [],
            [],
            [],
        );
    }
}
