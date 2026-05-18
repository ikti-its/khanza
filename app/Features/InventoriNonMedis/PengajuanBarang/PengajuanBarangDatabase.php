<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarang;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PengajuanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengajuan_barang',
            [
                'id_pengajuan'   => T::ID(100_000),
                'id_permintaan'  => T::FK_AUTO(),
                'tanggal'        => T::DTIME(),
                'status'         => T::RECORD(12),
                'catatan'        => T::NOTE()->nullable(),
                'catatan_atasan' => T::NOTE()->nullable(),
            ],
            'id_pengajuan',
            [],
            [
                [
                    'id_permintaan',
                    \App\Features\InventoriNonMedis\PermintaanBarang\PermintaanBarangDatabase::class,
                    'id_permintaan',
                ],
            ],
            true,
            'pengajuan_barang.csv'
        );
    }
}
