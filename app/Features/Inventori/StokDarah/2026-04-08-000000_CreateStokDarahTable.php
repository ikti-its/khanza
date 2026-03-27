<?php
declare(strict_types=1);

namespace App\Features\Inventori\StokDarah;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateStokDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'stok_darah',
            [
                'id_stok_darah'             => T::ID32(),
                'id_pemisahan'              => T::ID32(),
                'id_komponen'               => T::ID8(),
                'id_golongan_darah'         => T::ID8(),
                'id_rhesus'                 => T::ID8(),
                'tanggal_kadaluarsa'        => T::DATE(),
                'id_sumber_darah'           => T::ID8(),
                'id_status_stok'            => T::ID8(),
            ],
            ['id_stok_darah'],
            [],
            [
                [['id_pemisahan'], 'pemisahan_komponen', ['id_pemisahan'], 'CASCADE', 'CASCADE'],
                [['id_komponen'], 'darah.komponen_darah', ['id_komponen'], 'CASCADE', 'CASCADE'],
                [['id_golongan_darah'], 'darah.golongan_darah', ['id_golongan_darah'], 'CASCADE', 'CASCADE'],
                [['id_rhesus'], 'darah.rhesus', ['id_rhesus'], 'CASCADE', 'CASCADE'],
                [['id_sumber_darah'], 'sumber_darah', ['id_sumber_darah'], 'CASCADE', 'CASCADE'],
                [['id_status_stok'], 'status_stok', ['id_status_stok'], 'CASCADE', 'CASCADE'],
            ],
            [['id_status_stok', 'id_golongan_darah', 'id_rhesus', 'tanggal_kadaluarsa']],
        );
    }
}
