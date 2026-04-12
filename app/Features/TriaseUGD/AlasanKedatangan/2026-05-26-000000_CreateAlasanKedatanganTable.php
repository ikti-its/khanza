<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlasanKedatangan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateAlasanKedatanganTable extends Template
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'alasan_kedatangan',
            [
                'id_alasan'          => T::ID8(),
                'nama_alasan'        => T::TEXT(),
            ],
            ['id_alasan'],
            [['nama_alasan']],
            [],
            [],
            true,
            __DIR__ . '/alasan_kedatangan.csv'
        );
    }
}
