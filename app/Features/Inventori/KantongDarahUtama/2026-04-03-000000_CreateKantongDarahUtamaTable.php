<?php
declare(strict_types=1);

namespace App\Features\Inventori\KantongDarahUtama;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateKantongDarahUtamaTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'kantong_darah_utama',
            [
                'id_kantong'               => T::ID32(),
                'no_kantong'               => T::TEXT(),
                'id_pengambilan_darah'     => T::ID32(),
                'id_jenis_kantong'         => T::ID8(),
                'id_status_kantong'        => T::ID8(),
                'tanggal_diterima'         => T::DATE(),
                // 'id_petugas_penerima'      => T::ID32(),
            ],
            ['id_kantong'],
            [['no_kantong'], ['id_pengambilan_darah']],
            [
                [['id_pengambilan_darah'], 'donor.pengambilan_darah', ['id_pengambilan_darah'], 'CASCADE', 'CASCADE'],
                [['id_jenis_kantong'], 'jenis_kantong', ['id_jenis_kantong'], 'CASCADE', 'CASCADE'],
                [['id_status_kantong'], 'status_kantong', ['id_status_kantong'], 'CASCADE', 'CASCADE'],
                // [['id_petugas_penerima'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
