<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiSaring;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateNilaiSaringTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'nilai_saring',
            [
                'id_nilai_saring'      => T::ID8(),
                'nama_nilai_saring'    => T::TEXT(),
            ],
            'id_nilai_saring',
            'nama_nilai_saring',
            [],
            true,
            __DIR__ . '/nilai_saring.csv'
        );
    }
}
