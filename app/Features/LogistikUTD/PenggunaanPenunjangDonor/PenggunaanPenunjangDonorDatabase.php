<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanPenunjangDonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PenggunaanPenunjangDonorDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'penggunaan_penunjang_donor',
            [
                'id_penunjang_donor'        => T::ID32(100_000_000),
                'id_pengambilan_darah'      => T::FK_AUTO(),
                'id_barang'                 => T::FK_AUTO(),
                'jumlah'                    => T::INT32(),
                'harga'                     => T::F64(),
            ],
            'id_penunjang_donor',
            [],
            [
                [
                    'id_pengambilan_darah', 
                    \App\Features\Donor\PengambilanDarah\PengambilanDarahDatabase::class, 
                    'id_pengambilan_darah'
                ],
                [
                    'id_barang', 
                    \App\Features\InventoriNonMedis\Barang\BarangDatabase::class, 
                    'id_barang'
                ],
            ],
        );
    }
}
