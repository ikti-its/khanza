<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlatTransportasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateAlatTransportasiTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'alat_transportasi',
            [
                'id_transportasi'          => T::ID8(),
                'nama_transportasi'        => T::TEXT(),
            ],
            ['id_transportasi'],
            [['nama_transportasi']],
            [],
            [],
            true,
            __DIR__ . '/alat_transportasi.csv'
        );
    }
}
