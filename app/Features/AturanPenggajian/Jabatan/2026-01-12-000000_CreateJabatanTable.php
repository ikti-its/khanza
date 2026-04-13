<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Jabatan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateJabatanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'jabatan',
            [
                'no_jabatan'    => T::ID8(),
                'jenis_jabatan' => T::TEXT(),
                'nama_jabatan'  => T::TEXT(),
                'jenjang'       => T::TEXT(),
                'tunjangan'     => T::INT32(),
            ],
            ['no_jabatan'],
            [['nama_jabatan']],
            [],
            [],
        );
    }
}
