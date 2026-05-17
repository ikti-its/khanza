<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisDonor;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class MedisDonorDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'medis_donor',
            [
                'id_medis_donor'       => T::ID(100_000_000),
                'id_pengambilan_darah' => T::FK_AUTO(),
                'id_barang'            => T::FK_AUTO(),
                'jumlah'               => T::QTY(1, 999),
                'harga'                => T::MONEY(),
            ],
            'id_medis_donor',
            [],
            [
                [
                    'id_pengambilan_darah', 
                    \App\Features\Donor\PengambilanDarah\PengambilanDarahDatabase::class, 
                    'id_pengambilan_darah'
                ],
                [
                    'id_barang', 
                    \App\Features\InventoriMedis\DataBarang\DataBarangDatabase::class, 
                    'id_barang'
                ],
            ],
        );
    }
}
