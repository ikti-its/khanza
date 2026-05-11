<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksiAirway;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class PengkajianPreInduksiAirwayDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'pengkajian_pre_induksi_airway',
        [
            'id_airway'         => T::ID32(300_000_000),
            'id_pengkajian'     => T::FK_AUTO(),
            'id_jenis_airway'   => T::FK_AUTO(),
            'nomor'             => T::TEXT()->nullable(),
            'jenis'             => T::TEXT()->nullable(),
            'fiksasi_cm'        => T::INT8()->nullable(),
            'keterangan'        => T::TEXT()->nullable(),
        ],
        'id_airway',
        [],
        [
            [
                ['id_pengkajian'],
                \App\Features\Operasi\PengkajianPreInduksi\PengkajianPreInduksiDatabase::class,
                ['id_pengkajian'],
            ],
            [
                ['id_jenis_airway'],
                \App\Features\Operasi\RefJenisAirway\RefJenisAirwayDatabase::class,
                ['id_jenis'],
            ],
        ],
    );
}
}
