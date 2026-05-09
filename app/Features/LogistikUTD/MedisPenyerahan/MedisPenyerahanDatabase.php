<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisPenyerahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class MedisPenyerahanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'medis_penyerahan',
            [
                'id_medis_penyerahan' => T::ID32(100_000_000),
                'id_penyerahan'       => T::FK_AUTO(),
                'id_barang'           => T::UUID(),
                'jumlah'              => T::INT32(),
                'harga'               => T::F64(),
            ],
            'id_medis_penyerahan',
            [],
            [
                [
                    'id_penyerahan', 
                    \App\Features\DistribusiDarah\PenyerahanDarah\PenyerahanDarahDatabase::class, 
                    'id_penyerahan'
                ],
                // ['id_barang', 'sik.barang_medis_structure','id'],
            ],
        );
    }
}
