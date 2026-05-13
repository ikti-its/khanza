<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisRusak;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class MedisRusakDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'medis_rusak',
            [
                'id_medis_rusak' => T::ID(10_000_000),
                'id_barang'      => T::FK_AUTO(),
                'jumlah'         => T::QTY(1, 999),
                'harga_beli'     => T::MONEY(),
                'id_petugas'     => T::FK_AUTO(),
                'tanggal_rusak'  => T::DTIME(),
                'keterangan'     => T::NOTE(),
            ],
            'id_medis_rusak',
            [],
            [
                [
                    'id_barang', 
                    \App\Features\InventoriMedis\DataBarang\DataBarangDatabase::class, 
                    'id_barang'
                ],
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
        );
    }
}
