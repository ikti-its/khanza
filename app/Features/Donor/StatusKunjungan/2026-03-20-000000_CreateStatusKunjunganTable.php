<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusKunjungan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateStatusKunjunganTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'status_kunjungan',
            [
                'id_status_kunjungan'      => T::ID8(),
                'nama_status_kunjungan'    => T::TEXT(),
            ],
            'id_status_kunjungan',
            'nama_status_kunjungan',
            [],
            true,
            __DIR__ . '/status_kunjungan.csv'
        );
    }
}
