<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePengambilanDarahTable extends Template
{
    public function __construct(){
        parent::__construct(
            'donor',
            'pengambilan_darah',
            [
                'id_pengambilan_darah'    => T::ID32(),
                'nomor_pengambilan'       => T::TEXT(),
                'id_kunjungan'            => T::INT32(),
                'tanggal_pengambilan'     => T::DATE(),
                'id_shift'                => T::INT8(),
                'id_jenis_donor'          => T::INT8(),
                'id_lokasi_pengambilan'   => T::INT8(),
                'id_petugas'              => T::INT32(),
            ],
            ['id_pengambilan_darah'],
            [['nomor_pengambilan']],
            [
                [['id_kunjungan'], 'kunjungan', ['id_kunjungan'], 'CASCADE', 'CASCADE'],
                [['id_shift'], 'operasional.shift', ['id_shift'], 'CASCADE', 'CASCADE'],
                [['id_jenis_donor'], 'jenis_donor', ['id_jenis_donor'], 'CASCADE', 'CASCADE'],
                [['id_lokasi_pengambilan'], 'lokasi_pengambilan_darah', ['id_lokasi_pengambilan'], 'CASCADE', 'CASCADE'],
                // [['id_petugas'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
            ],
            [['id_kunjungan'], ['tanggal_pengambilan']],
        );
    }
}
