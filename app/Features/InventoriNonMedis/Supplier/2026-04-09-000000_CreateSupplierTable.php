<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Supplier;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateSupplierTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'supplier',
            [
                'id_supplier'   => T::ID32(),
                'nama_supplier' => T::TEXT(),
                'no_telp'       => T::TEXT()->nullable(),
                'id_alamat'     => T::INT32()->nullable(),
            ],
            ['id_supplier'],
            [],
            [
                [['id_alamat'], 'lokasi.alamat', ['id_alamat'], 'CASCADE', 'SET NULL'],
            ],
            true,
            __DIR__ . '/supplier.csv'
        );
    }
}
