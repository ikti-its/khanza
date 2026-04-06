<?php
declare(strict_types=1);

namespace App\Features\Inventori\PermintaanBarang;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePermintaanBarangTable extends Template
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
            'permintaan_barang',
            [
                'id_permintaan' => T::ID32(),
                'tanggal'       => T::DATETIME(),
                'status'        => T::TEXT(),
            ],
            ['id_permintaan'],
            [],
            [],
            [],
            true,
            __DIR__ . '/permintaan_barang.csv'
        );
    }
}
