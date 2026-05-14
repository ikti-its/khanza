<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseSekunder;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class DataTriaseSekunderDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'data_triase_sekunder',
            [
                'id_triase_sekunder' => T::ID(100_000_000),
                'id_triase'          => T::FK_AUTO(),
                'anamnesa_singkat'   => T::TEXT(),
                'catatan'            => T::NOTE(),
                'id_plan_sekunder'   => T::FK_AUTO(),
                'tanggal_triase'     => T::DTIME(),
                'id_petugas'         => T::FK_AUTO(),
            ],
            'id_triase_sekunder',
            ['id_triase'],
            [
                [
                    'id_triase', 
                    \App\Features\TriaseUGD\DataTriase\DataTriaseDatabase::class, 
                    'id_triase'
                ],
                [
                    'id_plan_sekunder', 
                    \App\Features\TriaseUGD\PlanSekunder\PlanSekunderDatabase::class, 
                    'id_plan_sekunder'
                ],
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
            false,
            'data_triase_sekunder.csv'
        );
    }
}
