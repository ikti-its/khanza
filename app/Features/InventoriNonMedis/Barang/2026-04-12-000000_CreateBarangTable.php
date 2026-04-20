<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateBarangTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'barang',
            [
                'id_barang'       => T::ID32(),
                'kode_barang'     => T::TEXT(),
                'nama_barang'     => T::TEXT(),
                'id_jenis_barang' => T::INT8(),

                'id_kategori'  => T::INT32(),
                'id_supplier'  => T::INT32()->nullable(),
                'id_unit'      => T::INT32(),
                'id_lokasi'    => T::INT32(),

                'stok'         => T::F64(),
                'stok_minimum' => T::F64()->nullable(),
                'harga_satuan' => T::F64()->nullable(),
            ],
            ['id_barang'],
            [
                ['kode_barang']
            ],
            [
                [['id_jenis_barang'], 'jenis_barang',   ['id_jenis_barang'], 'CASCADE', 'RESTRICT'],
                [['id_kategori'],     'kategori_barang', ['id_kategori'],    'CASCADE', 'RESTRICT'],
                [['id_supplier'],     'supplier',        ['id_supplier'],    'CASCADE', 'SET NULL'],
                [['id_unit'],         'unit',            ['id_unit'],        'CASCADE', 'RESTRICT'],
                [['id_lokasi'],       'lokasi',          ['id_lokasi'],      'CASCADE', 'RESTRICT'],
            ],
            true,
            __DIR__ . '/barang.csv'
        );
    }
}
