<?php
declare(strict_types=1);

namespace App\Features\InventoriMedis\DataBarang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class DataBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_medis',
            'data_barang',
            [
                'id_barang'     => T::ID(100_000_000),
                'kode_barang'   => T::CODE(10),
                'nama'          => T::NAME(80),
                'kode_satbesar' => T::CODE(4),
                'kode_sat'      => T::CODE(4)->nullable(),
                'h_dasar'       => T::MONEY(),
                'h_beli'        => T::MONEY()->nullable(),
                'h_ralan'       => T::MONEY()->nullable(),
                'h_kelas1'      => T::MONEY()->nullable(),
                'h_kelas2'      => T::MONEY()->nullable(),
                'h_kelas3'      => T::MONEY()->nullable(),
                'h_utama'       => T::MONEY()->nullable(),
                'h_vip'         => T::MONEY()->nullable(),
                'h_vvip'        => T::MONEY()->nullable(),
                'h_beliluar'    => T::MONEY()->nullable(),
                'h_jualbebas'   => T::MONEY()->nullable(),
                'h_karyawan'    => T::MONEY()->nullable(),
                'stok_minimum'  => T::QTY(0, 1_000_000)->nullable(),
                'kode_jenis'    => T::CODE(4)->nullable(),
                'isi'           => T::QTY(1, 1_000),
                'kapasitas'     => T::QTY(0, 1_000_000),
                'kadaluwarsa'   => T::EXPIRY(),
                'kode_industri' => T::CODE(5)->nullable(),
                'kode_kategori' => T::CODE(4)->nullable(),
                'kode_golongan' => T::CODE(4)->nullable(),
            ],
            'id_barang',
            ['kode_barang'],
            [],
            true,
            'data_barang.csv'
        );
    }
}
