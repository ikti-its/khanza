<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PajakPenghasilan21;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePajakPenghasilan21Table extends DatabaseTemplate
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
            'no_pph21',
            [],
            [],
        );
    }
}
