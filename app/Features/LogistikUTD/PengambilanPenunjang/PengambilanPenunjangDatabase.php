<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PengambilanPenunjangDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'pengambilan_penunjang',
            [
                'id_pengambilan_penunjang'  => T::ID32(30_000_000),
                'id_barang'                 => T::FK_AUTO(),
                'jumlah'                    => T::INT32(),
                'harga_beli'                => T::F64(),
                'id_petugas_gudang'         => T::FK_AUTO(),
                'tanggal_pengambilan'       => T::DATETIME(),
                'keterangan'                => T::TEXT(),
            ],
            'id_pengambilan_penunjang',
            [],
            [
                [
                    'id_barang', 
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class, 
                    'id_barang'
                ],
                [
                    'id_petugas_gudang', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
            false,
            'pengambilan_penunjang.csv'
        );
    }
}
