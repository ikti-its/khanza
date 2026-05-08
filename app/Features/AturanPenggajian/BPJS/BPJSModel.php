<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class BPJSModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new BPJSDatabase(),
            'BASE',
            'penggajian',
            'bpjs',
            'no_bpjs',
            [
                'no_bpjs'       => V::DEFAULT(), 
                'nama_program'  => V::DEFAULT(), 
                'penyelenggara' => V::DEFAULT(),
                'tarif'         => V::DEFAULT(),
                'batas_atas'    => V::DEFAULT(),
                'batas_bawah'   => V::DEFAULT(),
            ],
            [],
        );
    }
}