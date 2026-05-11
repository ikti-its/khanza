<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\KategoriBarang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class KategoriBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'kategori_barang',
            [
                'id_kategori'   => T::ID(50),
                'kode_kategori_barang' => T::CODE(3),
                'nama_kategori_barang' => T::NAME(50),
            ],
            'id_kategori',
            ['kode_kategori_barang'],
            [],
            true,
            'kategori_barang.csv'
        );
    }
}