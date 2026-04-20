<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Lokasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateLokasiTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'lokasi',
            [
                'id_lokasi'   => T::ID32(),
                'nama_lokasi' => T::TEXT(),
            ],
            ['id_lokasi'],
            [],
            [],
            true,
            __DIR__ . '/lokasi.csv'
        );
    }
}
