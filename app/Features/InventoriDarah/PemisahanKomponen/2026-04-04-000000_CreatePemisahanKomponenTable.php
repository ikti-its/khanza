<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponen;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreatePemisahanKomponenTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'pemisahan_komponen',
            [
                'id_pemisahan'          => T::ID32(),
                'id_bag'                => T::INT32(),
                'tanggal_pemisahan'     => T::DATE(),
                'id_shift'              => T::INT8(),
                'id_petugas'            => T::UUID(),
            ],
            ['id_pemisahan'],
            [['id_bag']],
            [
                [['id_bag'], 'kantong_darah', ['id_bag'], 'CASCADE', 'CASCADE'],
                [['id_shift'], 'operasional.shift', ['id_shift'], 'CASCADE', 'CASCADE'],
                // [['id_petugas'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
