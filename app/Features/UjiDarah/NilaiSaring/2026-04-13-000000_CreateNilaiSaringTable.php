<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiSaring;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateNilaiSaringTable extends Template
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'nilai_saring',
            [
                'id_nilai_saring'      => T::ID8(),
                'nama_nilai_saring'    => T::TEXT(),
            ],
            ['id_nilai_saring'],
            [['nama_nilai_saring']],
            [],
            [],
            true,
            __DIR__ . '/nilai_saring.csv'
        );
    }
}
