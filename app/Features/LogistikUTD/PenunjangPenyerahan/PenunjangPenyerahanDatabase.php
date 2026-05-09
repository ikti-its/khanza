<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangPenyerahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class PenunjangPenyerahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'penunjang_penyerahan',
            [
                'id_penunjang_penyerahan' => T::ID32(100_000_000),
                'id_penyerahan'           => T::FK_AUTO(),
                'id_barang'               => T::FK_AUTO(),
                'jumlah'                  => T::INT32(),
                'harga'                   => T::F64(),
            ],
            'id_penunjang_penyerahan',
            [],
            [
                [
                    'id_penyerahan', 
                    \App\Features\DistribusiDarah\PenyerahanDarah\PenyerahanDarahDatabase::class, 
                    'id_penyerahan'
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
