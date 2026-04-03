<?php
declare(strict_types=1);

namespace App\Features\Inventori\Lokasi;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateLokasiTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
            'lokasi',
            [
                'id_lokasi'   => T::ID32(),
                'nama_lokasi' => T::TEXT(),
            ],
            ['id_lokasi'],
            [],
            [],
            [],
            true,
            __DIR__ . '/lokasi.csv'
        );
    }
}
