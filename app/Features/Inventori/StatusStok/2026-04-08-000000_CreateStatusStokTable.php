<?php
declare(strict_types=1);

namespace App\Features\Inventori\StatusStok;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateStatusStokTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'status_stok',
            [
                'id_status_stok'         => T::ID8(),
                'nama_status_stok'       => T::TEXT(),
            ],
            ['id_status_stok'],
            [['nama_status_stok']],
            [],
            [],
            true,
            __DIR__ . '/status_stok.csv'
        );
    }
}
