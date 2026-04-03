<?php
declare(strict_types=1);

namespace App\Features\Inventori\PermintaanBarangDetail;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreatePermintaanBarangDetailTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
            'permintaan_barang_detail',
            [
                'id_detail'     => T::ID32(),
                'id_permintaan' => T::ID32(),
                'id_barang'     => T::ID32(),
                'qty'           => T::F64(),
            ],
            ['id_detail'],
            [],
            [
                [['id_permintaan'], 'permintaan_barang', ['id_permintaan'], 'CASCADE', 'RESTRICT'],
                [['id_barang'], 'barang', ['id_barang'], 'CASCADE', 'RESTRICT'],
            ],
            [],
            true,
            __DIR__ . '/permintaan_barang_detail.csv'
        );
    }
}
