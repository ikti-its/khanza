<?php
declare(strict_types=1);

namespace App\Features\Inventori\KategoriBarang;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateKategoriBarangTable extends DatabaseTemplate
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

            false,
            ''
        );
    }
}