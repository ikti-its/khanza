<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\PajakPenghasilan21;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PajakPenghasilan21Model extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PajakPenghasilan21Database(),
            'BASE',
            'penggajian',
            'pph21',
            'no_pph21',
            [
                'no_pph21'    => V::DEFAULT(),
                'pkp_bawah'   => V::DEFAULT(),
                'pkp_atas'    => V::DEFAULT(),
                'tarif_pajak' => V::DEFAULT(),
                
            ],
            [],
        );
    }
}