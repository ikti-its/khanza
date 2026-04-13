<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\JenisBag;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateJenisBagTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
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
