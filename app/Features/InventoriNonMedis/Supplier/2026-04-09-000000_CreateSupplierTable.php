<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Supplier;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateSupplierTable extends Template
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
            [
                ['nama_supplier']
            ],
            true,
            __DIR__ . '/supplier.csv'
        );
    }
}
