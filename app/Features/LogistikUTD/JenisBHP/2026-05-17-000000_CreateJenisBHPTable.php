<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\JenisBHP;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateJenisBHPTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'jenis_bhp',
            [
                'id_jenis_bhp'       => T::ID8(),
                'nama_jenis_bhp'     => T::TEXT(),
            ],
            'id_jenis_bhp',
            'nama_jenis_bhp',
            [],
            true,
            __DIR__ . '/jenis_bhp.csv'
        );
    }
}
