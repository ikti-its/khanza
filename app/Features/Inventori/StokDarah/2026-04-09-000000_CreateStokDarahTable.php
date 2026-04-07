<?php
declare(strict_types=1);

namespace App\Features\Inventori\StokDarah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateStokDarahTable extends Template
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'stok_darah',
            [
                'id_stok_darah'              => T::ID32(),
                'id_pemisahan'               => T::INT32(),
                'no_kantong'                 => T::TEXT(),
                'id_komponen'                => T::INT8(),
                'id_golongan_darah'          => T::INT8(),
                'id_rhesus'                  => T::INT8(),
                'tanggal_pengambilan'        => T::DATE(),
                'tanggal_kadaluarsa'         => T::DATE(),
                'id_sumber_darah'            => T::INT8(),
                'id_status_stok'             => T::INT8(),
            ],
            ['id_stok_darah'],
            [['no_kantong']],
            [
                [['id_pemisahan'], 'pemisahan_komponen', ['id_pemisahan'], 'CASCADE', 'CASCADE'],
                [['id_komponen'], 'darah.komponen_darah', ['id_komponen'], 'CASCADE', 'CASCADE'],
                [['id_golongan_darah'], 'darah.golongan_darah', ['id_golongan_darah'], 'CASCADE', 'CASCADE'],
                [['id_rhesus'], 'darah.rhesus', ['id_rhesus'], 'CASCADE', 'CASCADE'],
                [['id_sumber_darah'], 'sumber_darah', ['id_sumber_darah'], 'CASCADE', 'CASCADE'],
                [['id_status_stok'], 'status_stok', ['id_status_stok'], 'CASCADE', 'CASCADE'],
            ],
            [['id_pemisahan'], ['id_status_stok'], ['tanggal_kadaluarsa']],
        );
    }
}
