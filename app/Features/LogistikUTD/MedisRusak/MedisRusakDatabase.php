<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisRusak;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class MedisRusakDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'medis_rusak',
            [
                'id_medis_rusak' => T::ID32(10_000_000),
                'id_barang'      => T::UUID(),
                'jumlah'         => T::INT32(),
                'harga_beli'     => T::F64(),
                'id_petugas'     => T::FK_AUTO(),
                'tanggal_rusak'  => T::DATETIME(),
                'keterangan'     => T::TEXT(),
            ],
            'id_medis_rusak',
            [],
            [
                // ['id_barang', 'sik.barang_medis_structure','id'],
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
        );
    }
}
