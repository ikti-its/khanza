<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\JenisBarang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class JenisBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'jenis_barang',
            [
                'id_jenis_barang'   => T::ID8(20),
                'nama_jenis_barang' => T::TEXT(),
            ],
            'id_jenis_barang',
            ['nama_jenis_barang'],
            [],
            true,
            'jenis_barang.csv'
        );
    }
}
