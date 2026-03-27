<?php
declare(strict_types=1);

namespace App\Features\Inventori\StatusKantong;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateStatusKantongTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
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
