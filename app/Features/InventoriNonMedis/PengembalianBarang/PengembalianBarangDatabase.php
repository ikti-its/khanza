<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengembalianBarang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PengembalianBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengembalian_barang',
            [
                'id_pengembalian'               => T::ID(100_000),
                'no_pengembalian'               => T::CODE(20),
                'tanggal'                       => T::DTIME(),
                'id_permintaan'                 => T::FK_AUTO(),
                'petugas'                       => T::FK_AUTO(),
                'master_ruangan'                => T::FK_AUTO(),
                'id_status_pengembalian_barang' => T::FK_AUTO(),
                'alasan'                        => T::NOTE(),
                'petugas_gudang'                => T::FK_AUTO()->nullable(),
                'tanggal_verifikasi'            => T::DTIME()->nullable(),
                'catatan_verifikasi'            => T::NOTE()->nullable(),
            ],
            'id_pengembalian',
            [],
            [
                [
                    'id_permintaan',
                    \App\Features\InventoriNonMedis\PermintaanBarang\PermintaanBarangDatabase::class,
                    'id_permintaan',
                ],
                [
                    'petugas',
                    \App\Features\Role\Petugas\PetugasDatabase::class,
                    'id_petugas',
                ],
                [
                    'master_ruangan',
                    \App\Features\Ruangan\RuanganDatabase::class,
                    'id_ruangan',
                ],
                [
                    'id_status_pengembalian_barang',
                    \App\Features\InventoriNonMedis\Lookup\StatusPengembalianBarang\StatusPengembalianBarangDatabase::class,
                    'id_status_pengembalian_barang',
                ],
                [
                    'petugas_gudang',
                    \App\Features\Role\Petugas\PetugasDatabase::class,
                    'id_petugas',
                ],
            ],
            true,
            'pengembalian_barang.csv',
        );
    }
}
