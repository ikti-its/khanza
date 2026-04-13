<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarahDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreatePermintaanDarahDetailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'permintaan_darah_detail',
            [
                'id_permintaan_detail'      => T::ID32(),
                'id_permintaan'             => T::INT32(),
                'id_komponen'               => T::INT8(),
                'id_golongan_darah'         => T::INT8(),
                'id_rhesus'                 => T::INT8(),
                'jumlah'                    => T::INT8(),
            ],
            ['id_permintaan_detail'],
            [['id_permintaan', 'id_komponen', 'id_golongan_darah', 'id_rhesus']],
            [
                [['id_permintaan'], 'permintaan_darah', ['id_permintaan'], 'CASCADE', 'CASCADE'],
                [['id_komponen'], 'darah.komponen_darah', ['id_komponen'], 'CASCADE', 'CASCADE'],
                [['id_golongan_darah'], 'darah.golongan_darah', ['id_golongan_darah'], 'CASCADE', 'CASCADE'],
                [['id_rhesus'], 'darah.rhesus', ['id_rhesus'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
