<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisPemisahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class MedisPemisahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'medis_pemisahan',
            [
                'id_medis_pemisahan' => T::ID32(100_000_000),
                'id_pemisahan'       => T::FK_AUTO(),
                'id_barang'          => T::UUID(),
                'jumlah'             => T::INT32(),
                'harga'              => T::F64(),
            ],
            'id_medis_pemisahan',
            [],
            [
                [
                    'id_pemisahan', 
                    \App\Features\InventoriDarah\PemisahanKomponen\PemisahanKomponenDatabase::class, 
                    'id_pemisahan'
                ],
                // ['id_barang', 'sik.barang_medis_structure','id'],
            ],
        );
    }
}
