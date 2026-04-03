<?php
declare(strict_types=1);

namespace App\Features\Inventori\Barang;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateBarangTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
            'barang',
            [
                'id_barang'   => T::ID32(),
                'nama_barang' => T::TEXT(),
                
                'id_kategori' => T::ID32(),
                'id_supplier' => T::ID32(),
                'id_unit'     => T::ID32(),
                'id_lokasi'   => T::ID32(),
                
                'stok'        => T::F64(),
            ],
            ['id_barang'],
            [],
            [
                [['id_kategori'], 'kategori_barang', ['id_kategori'], 'CASCADE', 'RESTRICT'],
                [['id_supplier'], 'supplier',        ['id_supplier'], 'CASCADE', 'RESTRICT'],
                [['id_unit'],     'unit',            ['id_unit'],     'CASCADE', 'RESTRICT'],
                [['id_lokasi'],   'lokasi',          ['id_lokasi'],   'CASCADE', 'RESTRICT'],
            ],
            [
                ['nama_barang']
            ],
            true,
            __DIR__ . '/barang.csv'
        );
    }
}
