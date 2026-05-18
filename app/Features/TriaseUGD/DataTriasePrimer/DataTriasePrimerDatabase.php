<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriasePrimer;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class DataTriasePrimerDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'data_triase_primer',
            [
                'id_triase_primer'    => T::ID(100_000_000),
                'id_triase'           => T::FK_AUTO(),
                'keluhan_utama'       => T::TEXT(),
                'id_kebutuhan_khusus' => T::FK_AUTO(),
                'catatan'             => T::NOTE(),
                'id_plan_primer'      => T::FK_AUTO(),
                'tanggal_triase'      => T::DTIME(),
                'id_petugas'          => T::FK_AUTO(),
            ],
            'id_triase_primer',
            ['id_triase'],
            [
                [
                    'id_triase', 
                    \App\Features\TriaseUGD\DataTriase\DataTriaseDatabase::class, 
                    'id_triase'
                ],
                [
                    'id_kebutuhan_khusus', 
                    \App\Features\TriaseUGD\KebutuhanKhusus\KebutuhanKhususDatabase::class, 
                    'id_kebutuhan'
                ],
                [
                    'id_plan_primer', 
                    \App\Features\TriaseUGD\PlanPrimer\PlanPrimerDatabase::class, 
                    'id_plan_primer'
                ],
                [
                    'id_petugas', 
                    \App\Features\Role\Petugas\PetugasDatabase::class, 
                    'id_petugas'
                ],
            ],
        );
    }
}
