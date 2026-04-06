<?php
declare(strict_types=1);

namespace App\Features\Inventori\JenisBag;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateJenisBagTable extends Template
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'jenis_bag',
            [
                'id_jenis_bag'     => T::ID8(),
                'kode_jenis_bag'   => T::TEXT(),
                'nama_jenis_bag'   => T::TEXT(),
            ],
            ['id_jenis_bag'],
            [['kode_jenis_bag'], ['nama_jenis_bag']],
            [],
            [],
            true,
            __DIR__ . '/jenis_bag.csv'
        );
    }
}
