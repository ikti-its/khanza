<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpname;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateStokOpnameTable extends Template
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
            [
                ['tanggal'],
                ['status'],
            ],
            true,
            __DIR__ . '/stok_opname.csv'
        );
    }
}
