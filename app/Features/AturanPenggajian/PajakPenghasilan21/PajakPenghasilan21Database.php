<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PajakPenghasilan21;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PajakPenghasilan21Database extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'pph21',
            [
                'no_pph21'    => T::ID8(5),
                'pkp_bawah'   => T::INT64(),
                'pkp_atas'    => T::INT64(),
                'tarif_pajak' => T::F32(),
            ],
            'no_pph21',
            [
                'pkp_bawah',
                'pkp_atas',
            ],
            [],
        );
    }
}
