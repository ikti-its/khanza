<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Lembur;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateLemburTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'lembur',
            [
                'no_lembur'    => T::ID8(),
                'jenis_lembur' => T::TEXT(),
                'jam_lembur'   => T::INT8(),
                'pengali_upah' => T::F32(),
            ],
            ['no_lembur'],
            [['jenis_lembur', 'jam_lembur']],
            [],
            [],
        );
    }
}
