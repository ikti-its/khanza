<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponen;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PemisahanKomponenDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'pemisahan_komponen',
            [
                'id_pemisahan'      => T::ID32(100_000_000),
                'id_bag'            => T::FK_AUTO(),
                'tanggal_pemisahan' => T::DATE(),
                'id_shift'          => T::FK_AUTO(),
                'id_petugas'        => T::FK_AUTO(),
            ],
            'id_pemisahan',
            ['id_bag'],
            [
                [
                    'id_bag', 
                    \App\Features\InventoriDarah\KantongDarah\KantongDarahDatabase::class, 
                    'id_bag'
                ],
                [
                    'id_shift', 
                    \App\Features\Operasional\Shift\ShiftDatabase::class, 
                    'id_shift'
                ],
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
            false,
            'pemisahan_komponen.csv'
        );
    }
}
