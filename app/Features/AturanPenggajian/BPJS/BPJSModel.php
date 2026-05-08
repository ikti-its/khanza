<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class BPJSModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penggajian',
            'bpjs',
            'no_bpjs',
            [
                'no_bpjs' => V::TODO(), 
                'nama_program' => V::TODO(), 
                'penyelenggara' => V::TODO(),
                'tarif' => V::TODO(),
                'batas_atas' => V::TODO(),
                'batas_bawah' => V::TODO(),
            ],
        );
    }
}