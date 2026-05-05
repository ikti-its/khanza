<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanPenunjangPemisahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PenggunaanPenunjangPemisahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'penggunaan_penunjang_pemisahan',
            [
                'id_penunjang_pemisahan'       => T::ID32(100_000_000),
                'id_pemisahan'                 => T::FK_AUTO(),
                'id_barang'                    => T::FK_AUTO(),
                'jumlah'                       => T::INT32(),
                'harga'                        => T::F64(),
            ],
            'id_penunjang_pemisahan',
            [],
            [
                [
                    'id_pemisahan', 
                    \App\Features\InventoriDarah\PemisahanKomponen\PemisahanKomponenDatabase::class, 
                    'id_pemisahan'
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
