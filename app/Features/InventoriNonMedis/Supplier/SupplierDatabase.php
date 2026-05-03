<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Supplier;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class SupplierDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'supplier',
            [
                'id_supplier'   => T::ID16(200),
                'nama_supplier' => T::TEXT(),
                'no_telp'       => T::TEXT()->nullable(),
                'id_alamat'     => T::FK_AUTO()->nullable(),
            ],
            'id_supplier',
            [],
            [
                'id_alamat',
                \App\Features\Lokasi\Alamat\AlamatDatabase::class,
                'id_alamat',
            ],
            true,
            __DIR__ . '/supplier.csv'
        );
    }
}
