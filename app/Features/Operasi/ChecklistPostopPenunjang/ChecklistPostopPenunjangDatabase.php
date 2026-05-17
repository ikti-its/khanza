<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopPenunjang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class ChecklistPostopPenunjangDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'checklist_postop_penunjang',
        [
            'id_penunjang'          => T::ID(300_000_000),
            'id_checklist_post'     => T::FK_AUTO(),
            'id_jenis_penunjang'    => T::FK_AUTO(),
            'id_ketersediaan'       => T::FK_AUTO(),
            'keterangan'            => T::NOTE(),
        ],
        'id_penunjang',
        [],
        [
            [
                ['id_checklist_post'],
                \App\Features\Operasi\ChecklistPostop\ChecklistPostopDatabase::class,
                ['id_checklist_post'],
            ],
            [
                ['id_jenis_penunjang'],
                \App\Features\Operasi\RefJenisPenunjang\RefJenisPenunjangDatabase::class,
                ['id_jenis_penunjang'],
            ],
            [
                ['id_ketersediaan'],
                \App\Features\Operasi\RefKetersediaanStatus\RefKetersediaanStatusDatabase::class,
                ['id_ketersediaan_status'],
            ],
        ],
    );
}
}
