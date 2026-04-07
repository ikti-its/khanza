<?php
declare(strict_types=1);

namespace App\Features\Inventori\PemisahanKomponen;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePemisahanKomponenTable extends Template
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'pemisahan_komponen',
            [
                'id_pemisahan'          => T::ID32(),
                'id_bag'                => T::INT32(),
                'tanggal_pemisahan'     => T::DATE(),
                'id_shift'              => T::INT8(),
                'id_petugas'            => T::INT32(),
            ],
            ['id_pemisahan'],
            [['id_bag']],
            [
                [['id_bag'], 'kantong_darah', ['id_bag'], 'CASCADE', 'CASCADE'],
                [['id_shift'], 'operasional.shift', ['id_shift'], 'CASCADE', 'CASCADE'],
                // [['id_petugas'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
