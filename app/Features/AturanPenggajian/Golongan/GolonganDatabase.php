<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\Golongan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class GolonganDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penggajian',
            'golongan',
            [
                'no_golongan'   => T::ID8(20),
                'kode_golongan' => T::CODE(),
                'nama_golongan' => T::NAME(),
                'pendidikan'    => T::FK_AUTO(),
                'gaji_pokok'    => T::MONEY(),
            ],
            'no_golongan',
            [
                'nama_golongan', 
                'kode_golongan'
            ],
            [
                'pendidikan',
                \App\Features\Pendidikan\JenjangPendidikan\JenjangPendidikanDatabase::class,
                'nama_jenjang_pendidikan',
            ],
        );
    }
}
