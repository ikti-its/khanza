<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusKunjungan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateStatusKunjunganTable extends Template
{
    public function __construct(){
        parent::__construct(
            'donor',
            'status_kunjungan',
            [
                'id_status_kunjungan'      => T::ID8(),
                'nama_status_kunjungan'    => T::TEXT(),
            ],
            ['id_status_kunjungan'],
            [['nama_status_kunjungan']],
            [],
            [],
            true,
            __DIR__ . '/status_kunjungan.csv'
        );
    }
}
