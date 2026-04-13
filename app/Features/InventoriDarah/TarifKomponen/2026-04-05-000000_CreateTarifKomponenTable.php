<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\TarifKomponen;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateTarifKomponenTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'tarif_komponen',
            [
                'id_tarif'              => T::ID32(),
                'id_komponen'           => T::INT8(),
                'jasa_sarana'           => T::F32(),
                'paket_bhp'             => T::F32(),
                'kso'                   => T::F32(),
                'manajemen'             => T::F32(),
                'pembatalan'            => T::F32(),
                'tanggal_berlaku'       => T::DATE(),
            ],
            ['id_tarif'],
            [['id_komponen', 'tanggal_berlaku']],
            [
                [['id_komponen'], 'darah.komponen_darah', ['id_komponen'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
