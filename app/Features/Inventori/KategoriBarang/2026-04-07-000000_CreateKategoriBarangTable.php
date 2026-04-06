<?php
declare(strict_types=1);

namespace App\Features\Inventori\KategoriBarang;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateKategoriBarangTable extends Template
{
    public function __construct()
    {
        parent::__construct(
            'inventori',
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