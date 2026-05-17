<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisiPenunjang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class TimeOutSebelumInsisiPenunjangDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'time_out_sebelum_insisi_penunjang',
        [
            'id_penunjang'          => T::ID32(300_000_000),
            'id_timeout'            => T::FK_AUTO(),
            'id_jenis_penunjang'    => T::FK_AUTO(),
            'id_status'             => T::FK_AUTO(),
        ],
        'id_penunjang',
        [],
        [
            [
                ['id_timeout'],
                \App\Features\Operasi\TimeOutSebelumInsisi\TimeOutSebelumInsisiDatabase::class,
                ['id_timeout'],
            ],
            [
                ['id_jenis_penunjang'],
                \App\Features\Operasi\RefJenisPenunjang\RefJenisPenunjangDatabase::class,
                ['id_jenis_penunjang'],
            ],
            [
                ['id_status'],
                \App\Features\Operasi\RefStatusPenayangan\RefStatusPenayanganDatabase::class,
                ['id_status_penayangan'],
            ],
        ],
    );
}
}
