<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisDonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class MedisDonorDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'medis_donor',
            [
                'id_medis_donor'       => T::ID32(100_000_000),
                'id_pengambilan_darah' => T::FK_AUTO(),
                'id_barang'            => T::UUID(),
                'jumlah'               => T::INT32(),
                'harga'                => T::F64(),
            ],
            'id_medis_donor',
            [],
            [
                [
                    'id_pengambilan_darah', 
                    \App\Features\Donor\PengambilanDarah\PengambilanDarahDatabase::class, 
                    'id_pengambilan_darah'
                ],
                // ['id_barang', 'sik.barang_medis_structure','id'],
            ],
        );
    }
}
