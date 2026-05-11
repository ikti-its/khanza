<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Rujukan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RujukanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'rujukan',
            [
                'id_rujukan'            => T::ID32(5_000_000),
                'id_kasus'              => T::FK_AUTO(),
                'nomor_surat'           => T::TEXT(),
                'tanggal_rujukan'       => T::DATE(),
                'id_fasyankes'          => T::FK_AUTO(),
                'id_petugas_perujuk'    => T::FK_AUTO(),
            ],
            'id_rujukan',
            ['nomor_surat'],
            [
                [
                    'id_kasus', 
                    \App\Features\PenangananDonor\KasusReaktif\KasusReaktifDatabase::class, 
                    'id_kasus'
                ],
                [
                    'id_fasyankes', 
                    \App\Features\PenangananDonor\FasyankesRujukan\FasyankesRujukanDatabase::class, 
                    'id_fasyankes'
                ],
                [
                    'id_petugas_perujuk', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
        );
    }
}
