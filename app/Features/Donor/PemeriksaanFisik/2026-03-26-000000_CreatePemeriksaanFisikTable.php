<?php
declare(strict_types=1);

namespace App\Features\Donor\PemeriksaanFisik;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreatePemeriksaanFisikTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'pemeriksaan_fisik',
            [
                'id_pemeriksaan'    => T::ID32(),
                'id_kunjungan'      => T::ID32(),
                'sistolik'          => T::INT16(),
                'diastolik'         => T::INT16(),
                'berat_badan'       => T::F32(),
                'kadar_hemoglobin'  => T::F32(),
                'suhu_tubuh'        => T::F32(),
                'id_kesimpulan'     => T::ID8(),
            ],
            ['id_pemeriksaan'],
            [['id_kunjungan']],
            [
                [['id_kunjungan'], 'kunjungan', ['id_kunjungan'], 'CASCADE', 'CASCADE'],
                [['id_kesimpulan'], 'kesimpulan_medis', ['id_kesimpulan'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
