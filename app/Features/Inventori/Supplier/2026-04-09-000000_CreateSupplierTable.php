<?php
declare(strict_types=1);

namespace App\Features\Inventori\Supplier;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateSupplierTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
            'supplier',
            [
                'id_supplier'   => T::ID32(),
                'nama_supplier' => T::TEXT(),
                'no_telp'       => T::TEXT()->nullable(),
                'alamat'        => T::TEXT()->nullable(),
            ],
            ['id_supplier'],
            [],
            [],
            [
                ['nama_supplier']
            ],
            false,
            ''
        );
    }
}
