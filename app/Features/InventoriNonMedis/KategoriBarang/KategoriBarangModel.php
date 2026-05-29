<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\KategoriBarang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KategoriBarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new KategoriBarangDatabase(),
            [
                'id_kategori'          => V::DEFAULT(),
                'kode_kategori_barang' => V::DEFAULT(),
                'nama_kategori_barang' => V::DEFAULT(),
            ],
            [],
        );
    }
}
