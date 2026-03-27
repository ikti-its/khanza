<?php
declare(strict_types=1);

namespace App\Features\Inventori\JenisKantong;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateJenisKantongTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'jenis_kantong',
            [
                'id_jenis_kantong'     => T::ID8(),
                'kode_jenis_kantong'   => T::TEXT(),
                'nama_jenis_kantong'   => T::TEXT(),
            ],
            ['id_jenis_kantong'],
            [['kode_jenis_kantong'], ['nama_jenis_kantong']],
            [],
            [],
            true,
            __DIR__ . '/jenis_kantong.csv'
        );
    }
}
