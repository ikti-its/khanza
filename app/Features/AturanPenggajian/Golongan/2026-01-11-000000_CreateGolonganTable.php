<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Golongan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateGolonganTable extends Template
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
            []
        );
    }
}
