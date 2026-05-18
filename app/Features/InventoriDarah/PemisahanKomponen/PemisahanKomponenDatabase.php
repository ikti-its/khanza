<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponen;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PemisahanKomponenDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'pemisahan_komponen',
            [
                'id_pemisahan'          => T::ID(100_000_000),
                'id_pengambilan_darah'  => T::FK_AUTO(),
                'tanggal_pemisahan'     => T::DATE(),
                'id_shift'              => T::FK_AUTO(),
                'id_petugas'            => T::FK_AUTO(),
            ],
            'id_pemisahan',
            ['id_pengambilan_darah'],
            [
                [
                    'id_pengambilan_darah', 
                    \App\Features\Donor\PengambilanDarah\PengambilanDarahDatabase::class, 
                    'id_pengambilan_darah'
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
