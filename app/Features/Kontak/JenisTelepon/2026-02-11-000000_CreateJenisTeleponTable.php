<?php
declare(strict_types=1);

namespace App\Features\Kontak\JenisTelepon;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateJenisTeleponTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'jenis_telepon',
            [
                'id_jenis_telepon'   => T::ID8(),
                'nama_jenis_telepon' => T::TEXT(),
            ],
            ['id_jenis_telepon'],
            [['nama_jenis_telepon']],
            [],
            [],
        );
    }
}
