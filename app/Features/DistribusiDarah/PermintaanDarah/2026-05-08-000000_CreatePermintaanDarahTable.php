<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreatePermintaanDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'permintaan_darah',
            [
                'id_permintaan'           => T::ID32(),
                'no_rawat'                => T::TEXT(),
                'kode_dokter_pengirim'    => T::TEXT(),
                'tanggal_permintaan'      => T::DATETIME(),
                'id_status_permintaan'    => T::INT8(),
            ],
            ['id_permintaan'],
            [['no_rawat']],
            [
                // [['no_rawat'], 'sik.rawat_inap', ['no_rawat'], 'CASCADE', 'CASCADE'],
                // [['kode_dokter_pengirim'], 'sik.dokter', ['kode_dokter'], 'CASCADE', 'CASCADE'],
                [['id_status_permintaan'], 'status_permintaan', ['id_status_permintaan'], 'CASCADE', 'CASCADE'],
            ],
            [['tanggal_permintaan'], ['id_status_permintaan']],
        );
    }
}
