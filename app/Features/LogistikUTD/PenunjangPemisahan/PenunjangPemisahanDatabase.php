<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangPemisahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PenunjangPemisahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'penunjang_pemisahan',
            [
                'id_penunjang_pemisahan' => T::ID(100_000_000),
                'id_pemisahan'           => T::FK_AUTO(),
                'id_barang'              => T::FK_AUTO(),
                'jumlah'                 => T::QTY(1, 999),
                'harga'                  => T::MONEY(),
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
