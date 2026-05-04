<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PengajuanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengajuan_barang',
            [
                'id_pengajuan'     => T::ID32(100_000),
                'id_permintaan'    => T::FK_AUTO()->nullable(),
                'tanggal'          => T::DATETIME(),
                'status'           => T::TEXT(),
                'catatan'          => T::TEXT()->nullable(),
                'catatan_atasan'   => T::TEXT()->nullable(),
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
