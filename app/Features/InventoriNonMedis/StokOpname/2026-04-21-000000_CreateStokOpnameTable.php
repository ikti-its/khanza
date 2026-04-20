<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpname;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateStokOpnameTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'stok_opname',
            [
                'id_opname'      => T::ID32(),
                'tanggal'        => T::DATETIME(),
                'status'         => T::TEXT(),
                'catatan'        => T::TEXT()->nullable(),
                'catatan_atasan' => T::TEXT()->nullable(),
            ],
            ['id_opname'],
            [],
            [],
            true,
            __DIR__ . '/stok_opname.csv'
        );
    }
}
