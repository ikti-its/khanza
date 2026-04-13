<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateBPJSTable extends Template
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'bpjs',
            [
                'no_bpjs'       => T::ID8(),
                'nama_program'  => T::TEXT(),
                'penyelenggara' => T::TEXT(),
                'tarif'         => T::F32(),
                'batas_atas'    => T::INT32(),
                'batas_bawah'   => T::INT32(),
            ],
            ['no_bpjs'],
            [['nama_program']],
            [],
            [],
            true,
            __DIR__ . '/bpjs.csv'
        );
    }
}
