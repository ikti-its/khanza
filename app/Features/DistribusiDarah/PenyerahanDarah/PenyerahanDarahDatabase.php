<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PenyerahanDarahDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'penyerahan_darah',
            [
                'id_penyerahan'             => T::ID32(30_000_000),
                'id_permintaan'             => T::FK_AUTO(),
                'no_penyerahan'             => T::TEXT(),
                'tanggal_penyerahan'        => T::DATETIME(),
                'id_shift'                  => T::FK_AUTO(),
                'id_petugas_cross'          => T::FK_AUTO(),
                'keterangan'                => T::TEXT()->nullable(),
                'id_status_pembayaran'      => T::FK_AUTO(),
                'id_rekening'               => T::FK_AUTO(),
                'pengambil_darah'           => T::TEXT(),
                'alamat_pengambil'          => T::TEXT(),
                'id_penanggung_jawab'       => T::FK_AUTO(),
                'besar_ppn'                 => T::F32(),
            ],
            'id_penyerahan',
            ['no_penyerahan'],
            [
                [
                    'id_permintaan', 
                    \App\Features\DistribusiDarah\PermintaanDarah\PermintaanDarahDatabase::class, 
                    'id_permintaan'
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
                [
                    'id_status_pembayaran', 
                    \App\Features\DistribusiDarah\StatusPembayaran\StatusPembayaranDatabase::class, 
                    'id_status_pembayaran'
                ],
                [
                    'id_rekening', 
                    \App\Features\Finansial\Rekening\RekeningDatabase::class, 
                    'id_rekening'
                ],
                [
                    'id_penanggung_jawab', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
            false,
            'penyerahan_darah.csv'
        );
    }
}
