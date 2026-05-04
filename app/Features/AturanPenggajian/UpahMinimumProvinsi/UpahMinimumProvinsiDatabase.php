<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\UpahMinimumProvinsi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class UpahMinimumProvinsiDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'upah_minimum_provinsi',
            [
                'no_ump'       => T::ID16(3000),
                'tahun'        => T::YEAR(),
                'provinsi'     => T::FK_AUTO(),
                'upah_minimum' => T::INT32(),
            ],
            'no_ump',
            [
                ['tahun', 'provinsi']
            ],
            [
                [
                    'provinsi', 
                    \App\Features\Lokasi\Provinsi\ProvinsiDatabase::class,
                    'id_provinsi'
                ]
            ],
        );
    }
}
