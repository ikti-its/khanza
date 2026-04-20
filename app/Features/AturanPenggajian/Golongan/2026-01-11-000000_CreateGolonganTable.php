<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Golongan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateGolonganTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'golongan',
            [
                'no_golongan'   => T::ID8(),
                'kode_golongan' => T::TEXT(),
                'nama_golongan' => T::TEXT(),
                'pendidikan'    => T::TEXT(),
                'gaji_pokok'    => T::INT32(),
            ],
            ['no_golongan'],
            [['nama_golongan'], ['kode_golongan']],
            [],
        );
    }
}
