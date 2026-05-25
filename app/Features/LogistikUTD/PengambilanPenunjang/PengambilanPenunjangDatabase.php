<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PengambilanPenunjangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'logistik_utd',
            'pengambilan_penunjang',
            [
                'id_pengambilan_penunjang' => T::ID(30_000_000),
                'id_barang'                => T::FK_AUTO(),
                'jumlah'                   => T::QTY(1, 999),
                'harga_beli'               => T::MONEY(),
                'id_petugas_gudang'        => T::FK_AUTO(),
                'tanggal_pengambilan'      => T::DTIME(),
                'keterangan'               => T::NOTE(),
            ],
            'id_pengambilan_penunjang',
            [],
            [
                [
                    'id_barang',
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class,
                    'id_barang',
                ],
                [
                    'id_petugas_gudang',
                    \App\Features\Role\Petugas\PetugasDatabase::class,
                    'id_petugas',
                ],
            ],
            false,
            'pengambilan_penunjang.csv',
        );
    }
}
