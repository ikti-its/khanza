<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusKantong;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateStatusKantongTable extends Template
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'status_kantong',
            [
                'id_status_kantong'     => T::ID8(),
                'nama_status_kantong'   => T::TEXT(),
            ],
            ['id_status_kantong'],
            [['nama_status_kantong']],
            [],
            [],
            true,
            __DIR__ . '/status_kantong.csv'
        );
    }
}
