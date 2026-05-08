<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Barang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class BarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'barang',
            'id_barang',
            [
                'id_barang' => V::TODO(),
                'kode_barang' => V::TODO(),
                'nama_barang' => V::TODO(),
                'id_kategori' => V::TODO(),
                'id_suplier' => V::TODO(),
                'id_satuan' => V::TODO(),
                'id_lokasi_penyimpanan' => V::TODO(),
                'stok' => V::TODO(),
                'stok_minimum' => V::TODO(),
                'harga_satuan' => V::TODO(),
            ],
        );
    }
}
