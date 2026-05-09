<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class DataTriaseDetailDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'data_triase_detail',
            [
                'id_triase_detail' => T::ID32(300_000_000),
                'id_triase'        => T::FK_AUTO(),
                'id_skala'         => T::FK_AUTO(),
            ],
            'id_triase_detail',
            [['id_triase', 'id_skala']],
            [
                [
                    'id_triase', 
                    \App\Features\TriaseUGD\DataTriase\DataTriaseDatabase::class, 
                    'id_triase'
                ],
                [
                    'id_skala', 
                    \App\Features\TriaseUGD\TriaseSkala\TriaseSkalaDatabase::class, 
                    'id_skala'
                ],
            ],
            false,
            'data_triase_detail.csv'
        );
    }
}
