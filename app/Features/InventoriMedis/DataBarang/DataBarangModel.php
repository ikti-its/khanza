<?php
declare(strict_types=1);

namespace App\Features\InventoriMedis\DataBarang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class DataBarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new DataBarangDatabase(),
            'BASE',
            'inventori_medis',
            'data_barang',
            'id_barang',
            [
                'id_barang'     => V::DEFAULT(),
                'kode_barang'   => V::DEFAULT(),
                'nama'          => V::DEFAULT(),
                'kode_satbesar' => V::DEFAULT(),
                'kode_sat'      => V::DEFAULT(),
                'h_dasar'       => V::DEFAULT(),
                'h_beli'        => V::DEFAULT(),
                'h_ralan'       => V::DEFAULT(),
                'h_kelas1'      => V::DEFAULT(),
                'h_kelas2'      => V::DEFAULT(),
                'h_kelas3'      => V::DEFAULT(),
                'h_utama'       => V::DEFAULT(),
                'h_vip'         => V::DEFAULT(),
                'h_vvip'        => V::DEFAULT(),
                'h_beliluar'    => V::DEFAULT(),
                'h_jualbebas'   => V::DEFAULT(),
                'h_karyawan'    => V::DEFAULT(),
                'stok_minimum'  => V::DEFAULT(),
                'kode_jenis'    => V::DEFAULT(),
                'isi'           => V::DEFAULT(),
                'kapasitas'     => V::DEFAULT(),
                'kadaluwarsa'   => V::DEFAULT(),
                'kode_industri' => V::DEFAULT(),
                'kode_kategori' => V::DEFAULT(),
                'kode_golongan' => V::DEFAULT(),
            ],
            [],
        );
    }
}
