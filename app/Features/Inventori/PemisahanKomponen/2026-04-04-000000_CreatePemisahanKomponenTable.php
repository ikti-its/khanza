<?php
declare(strict_types=1);

namespace App\Features\Inventori\PemisahanKomponen;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreatePemisahanKomponenTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'pemisahan_komponen',
            [
                'id_pemisahan'          => T::ID32(),
                'id_kantong'            => T::ID32(),
                'tanggal_pemisahan'     => T::DATE(),
                // 'id_petugas'            => T::ID32(),
            ],
            ['id_pemisahan'],
            [['id_kantong']],
            [
                [['id_kantong'], 'kantong_darah_utama', ['id_kantong'], 'CASCADE', 'CASCADE'],
                // [['id_petugas'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
