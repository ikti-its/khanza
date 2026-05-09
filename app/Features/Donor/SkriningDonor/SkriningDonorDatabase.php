<?php
declare(strict_types=1);

namespace App\Features\Donor\SkriningDonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class SkriningDonorDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'skrining_donor',
            [
                'id_skrining'          => T::ID32(100_000_000),
                'id_kunjungan'         => T::FK_AUTO(),
                'sistolik'             => T::INT16(),
                'diastolik'            => T::INT16(),
                'berat_badan'          => T::F32(),
                'kadar_hemoglobin'     => T::F32(),
                'suhu_tubuh'           => T::F32(),
                'id_hasil_anamnesis'   => T::FK_AUTO(),
            ],
            'id_skrining',
            ['id_kunjungan'],
            [
                [
                    'id_kunjungan', 
                    \App\Features\Donor\Kunjungan\KunjunganDatabase::class, 
                    'id_kunjungan'
                ],
                [
                    'id_hasil_anamnesis', 
                    \App\Features\Donor\HasilAnamnesis\HasilAnamnesisDatabase::class, 
                    'id_hasil'
                ],
            ],
            false,
            'skrining_donor.csv'
        );
    }
}
