<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorBromage;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class SkorBromageDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'skor_bromage',
        [
            'id_skor_bromage'    => T::ID32(300_000_000),
            'nomor_reg'          => T::FK_AUTO(),
            'waktu_penilaian'    => T::DATETIME(),
            'id_petugas'         => T::FK_AUTO(),
            'id_dokter_anestesi' => T::FK_AUTO(),
            'skor_bromage'       => T::FK_AUTO(),
            'is_boleh_pindah'    => T::BOOL(),
            'catatan_keluar'     => T::TEXT(),
            'instruksi_rr'       => T::TEXT(),
        ],
        'id_skor_bromage',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
           [
                ['id_petugas'],
                \App\Features\Role\Petugas\PetugasDatabase::class,
                ['id_petugas'],
            ],
            [
                ['id_dokter_anestesi'],
                \App\Features\Role\Dokter\DokterDatabase::class,
                ['id_dokter'],
            ],
            [
                ['skor_bromage'],
                \App\Features\Operasi\RefBromage\RefBromageDatabase::class,
                ['id_bromage'],
            ],
        ],
    );
}
}
