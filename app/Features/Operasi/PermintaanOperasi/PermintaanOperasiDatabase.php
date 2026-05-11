<?php
declare(strict_types=1);

namespace App\Features\Operasi\PermintaanOperasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class PermintaanOperasiDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'permintaan_operasi',
        [
            'id_permintaan' => T::ID32(300_000_000),
            'nomor_reg'     => T::FK_AUTO(),
            'kode_dokter'   => T::FK_AUTO(),
            'tanggal_minta' => T::DATETIME(),
            'is_cito'       => T::BOOL(),
        ],
        'id_permintaan',
        [],
        [
            // ['nomor_reg', 'sik.registrasi_structure', 'nomor_reg'],
            [
                ['kode_dokter'],
                \App\Features\Role\Dokter\DokterDatabase::class,
                ['id_dokter'],
            ],
        ],
    );
}
}
