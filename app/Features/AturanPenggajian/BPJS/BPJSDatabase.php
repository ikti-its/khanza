<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class BPJSDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'bpjs',
            [
                'no_bpjs'         => T::ID8(5),
                'nama_program'    => T::NAME(),
                'penyelenggara'   => T::NAME(),
                'tarif_persentase'=> T::PERCENT(),
                'batas_atas'      => T::MONEY(),
                'batas_bawah'     => T::MONEY(),
            ],
            'no_bpjs',
            ['nama_program'],
            [],
            true,
            'bpjs.csv'
        );
    }
}
