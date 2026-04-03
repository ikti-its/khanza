<?php
declare(strict_types=1);

namespace App\Features\Inventori\MutasiStok;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateMutasiStokTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
            'mutasi_stok',
            [
                'id_mutasi'   => T::ID32(),
                'id_barang'   => T::ID32(),
                'dari_lokasi' => T::ID32(),
                'ke_lokasi'   => T::ID32(),
                'qty'         => T::F64(),
            ],
            ['id_mutasi'],
            [],
            [
                [['id_barang'], 'barang', ['id_barang'], 'CASCADE', 'RESTRICT'],
                [['dari_lokasi'], 'lokasi', ['id_lokasi'], 'CASCADE', 'RESTRICT'],
                [['ke_lokasi'], 'lokasi', ['id_lokasi'], 'CASCADE', 'RESTRICT'],
            ],
            [],
            false,
            ''
        );
    }
}
