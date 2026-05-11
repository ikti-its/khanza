<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopDrain;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class ChecklistPostopDrainDatabase extends DatabaseTemplate
{
    public function __construct(){
    parent::__construct(
        'operasi',
        'checklist_postop_drain',
        [
            'id_drain'           => T::ID32(300_000_000),
            'id_checklist_post'  => T::FK_AUTO(),
            'id_ketersediaan'    => T::FK_AUTO(),
            'jumlah'             => T::INT32(),
            'letak'              => T::TEXT(),
            'warna'              => T::TEXT(),
        ],
        'id_drain',
        [],
        [
           [
                    ['id_checklist_post'],
                    \App\Features\Operasi\ChecklistPostop\ChecklistPostopDatabase::class,
                    ['id_checklist_post'],
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
