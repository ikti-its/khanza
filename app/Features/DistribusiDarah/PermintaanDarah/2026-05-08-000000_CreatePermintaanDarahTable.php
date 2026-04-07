<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePermintaanDarahTable extends Template
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'permintaan_darah',
            [
                'id_permintaan'           => T::ID32(),
                'no_rawat'                => T::TEXT(),
                'tanggal_permintaan'      => T::DATETIME(),
                'dokter_pengirim'         => T::TEXT(),
                'id_status_permintaan'    => T::INT8(),
            ],
            ['id_permintaan'],
            [['no_rawat']],
            [
                // [['no_rawat'], 'sik.rawat_inap', ['no_rawat'], 'CASCADE', 'CASCADE'],
                [['id_status_permintaan'], 'status_permintaan', ['id_status_permintaan'], 'CASCADE', 'CASCADE'],
            ],
            [['tanggal_permintaan'], ['id_status_permintaan']],
        );
    }
}
