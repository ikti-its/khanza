<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PajakPenghasilan21;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PajakPenghasilan21Database extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'pph21',
            [
                'no_pph21'    => T::ID(5),
                'pkp_bawah'   => T::MONEY(),
                'pkp_atas'    => T::MONEY(),
                'tarif_pajak' => T::PERCENT(),
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
