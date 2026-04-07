<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\JenisBarang;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateJenisBarangTable extends Template
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'jenis_barang',
            [
                'id_jenis_barang'   => T::ID8(),
                'nama_jenis_barang' => T::TEXT(),
            ],
            ['id_jenis_barang'],
            [
                ['nama_jenis_barang']
            ],
            [],
            [],
            true,
            __DIR__ . '/jenis_barang.csv'
        );
    }
}
