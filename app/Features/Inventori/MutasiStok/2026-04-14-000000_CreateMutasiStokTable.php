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
                'lokasi_sumber' => T::ID32(),
                'lokasi_tujuan'   => T::ID32(),
                'qty'         => T::F64(),
                'tanggal'     => T::DATETIME(),
            ],
            ['id_mutasi'],
            [],
            [
                [['id_barang'], 'barang', ['id_barang'], 'CASCADE', 'RESTRICT'],
                [['lokasi_sumber'], 'lokasi', ['id_lokasi'], 'CASCADE', 'RESTRICT'],
                [['lokasi_tujuan'], 'lokasi', ['id_lokasi'], 'CASCADE', 'RESTRICT'],
            ],
            [],
            
            true,
            __DIR__ . '/mutasi_stok.csv'
        );
    }
}
