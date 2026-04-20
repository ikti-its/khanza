<?php
declare(strict_types=1);

namespace App\Features\Donor\SkriningDonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateSkriningDonorTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'skrining_donor',
            [
                'id_skrining'          => T::ID32(),
                'id_kunjungan'         => T::INT32(),
                'sistolik'             => T::INT16(),
                'diastolik'            => T::INT16(),
                'berat_badan'          => T::F32(),
                'kadar_hemoglobin'     => T::F32(),
                'suhu_tubuh'           => T::F32(),
                'id_hasil_anamnesis'   => T::INT8(),
            ],
            ['id_skrining'],
            [['id_kunjungan']],
            [
                [['id_kunjungan'], 'kunjungan', ['id_kunjungan'], 'CASCADE', 'CASCADE'],
                [['id_hasil_anamnesis'], 'hasil_anamnesis', ['id_hasil'], 'CASCADE', 'CASCADE'],
            ],
            false,
            __DIR__ . '/skrining_donor.csv'
        );
    }
}
