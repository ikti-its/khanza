<?php
declare(strict_types=1);

namespace App\Features\Inventori\TarifKomponen;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateTarifKomponenTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'tarif_komponen',
            [
                'id_tarif'              => T::ID32(),
                'id_komponen'           => T::ID8(),
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
