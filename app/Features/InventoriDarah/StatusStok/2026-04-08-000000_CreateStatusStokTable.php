<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusStok;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateStatusStokTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'status_stok',
            [
                'id_status_stok'         => T::ID8(),
                'nama_status_stok'       => T::TEXT(),
            ],
            'id_status_stok',
            'nama_status_stok',
            [],
            true,
            __DIR__ . '/status_stok.csv'
        );
    }
}
