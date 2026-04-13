<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPermintaan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateStatusPermintaanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'status_permintaan',
            [
                'id_status_permintaan'    => T::ID8(),
                'nama_status_permintaan'  => T::TEXT(),
            ],
            ['id_status_permintaan'],
            [['nama_status_permintaan']],
            [],
            [],
            true,
            __DIR__ . '/status_permintaan.csv'
        );
    }
}
