<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateBarangTable extends Template
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'barang',
            [
                'id_barang'    => T::ID32(),
                'kode_barang'  => T::TEXT(),
                'nama_barang'  => T::TEXT(),
                'jenis_barang' => T::TEXT(),

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
                [['id_kategori'], 'kategori_barang', ['id_kategori'], 'CASCADE', 'RESTRICT'],
                [['id_supplier'], 'supplier',        ['id_supplier'], 'CASCADE', 'SET NULL'],
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
