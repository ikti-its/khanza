<?php
declare(strict_types=1);

namespace App\Features\Donor\JenisDonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateJenisDonorTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'jenis_donor',
            [
                'id_jenis_donor'      => T::ID8(),
                'kode_jenis_donor'    => T::TEXT(),
                'nama_jenis_donor'    => T::TEXT(),
            ],
            'id_jenis_donor',
            ['kode_jenis_donor', 'nama_jenis_donor'],
            [],
            true,
            __DIR__ . '/jenis_donor.csv'
        );
    }
}
