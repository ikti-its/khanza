<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\JenisBarang;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateJenisBarangTable extends Template
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'jenis_barang',
            [
                'id_jenis_barang'       => T::ID8(),
                'nama_jenis_barang'     => T::TEXT(),
            ],
            ['id_jenis_barang'],
            [['nama_jenis_barang']],
            [],
            [],
            true,
            __DIR__ . '/jenis_barang.csv'
        );
    }
}
