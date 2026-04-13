<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\KategoriBarang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateKategoriBarangTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'kategori_barang',
            [
                'id_kategori'   => T::ID32(),
                'kode_kategori_barang' => T::TEXT(),
                'nama_kategori_barang' => T::TEXT(),
            ],
            ['id_kategori'],

            [
                ['kode_kategori_barang']
            ],

            [],

            [
                ['nama_kategori_barang']
            ],

            true,
            __DIR__ . '/kategori_barang.csv'
        );
    }
}