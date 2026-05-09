<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangRusak;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PenunjangRusakDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'penunjang_rusak',
            [
                'id_penunjang_rusak' => T::ID32(10_000_000),
                'id_barang'          => T::FK_AUTO(),
                'jumlah'             => T::INT32(),
                'harga_beli'         => T::F64(),
                'id_petugas'         => T::FK_AUTO(),
                'tanggal_rusak'      => T::DATETIME(),
                'keterangan'         => T::TEXT(),
            ],
            'id_penunjang_rusak',
            [],
            [
                [
                    'id_barang', 
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class, 
                    'id_barang'
                ],
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
            false,
            'penunjang_rusak.csv'
        );
    }
}
