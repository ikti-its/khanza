<?php
declare(strict_types=1);

namespace App\Features\Donor\SkriningDonor;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class SkriningDonorDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'skrining_donor',
            [
                'id_skrining'          => T::ID(100_000_000),
                'id_kunjungan'         => T::FK_AUTO(),
                'sistolik'             => T::VITAL(70, 250),
                'diastolik'            => T::VITAL(40, 150),
                'berat_badan'          => T::BODY(),
                'kadar_hemoglobin'     => T::LAB(),
                'suhu_tubuh'           => T::TEMP(),
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
