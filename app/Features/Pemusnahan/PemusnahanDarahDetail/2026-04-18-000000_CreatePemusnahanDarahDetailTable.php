<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\PemusnahanDarahDetail;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePemusnahanDarahDetailTable extends Template
{
    public function __construct(){
        parent::__construct(
            'pemusnahan',
            'pemusnahan_darah_detail',
            [
                'id_pemusnahan_detail'  => T::ID32(),
                'id_pemusnahan'         => T::ID32(),
                'id_stok_darah'         => T::ID32(),
                'id_alasan'             => T::ID8(),
            ],
            ['id_pemusnahan_detail'],
            [['id_stok_darah']],
            [
                [['id_pemusnahan'], 'pemusnahan_darah', ['id_pemusnahan'], 'CASCADE', 'CASCADE'],
                [['id_stok_darah'], 'inventori.stok_darah', ['id_stok_darah'], 'CASCADE', 'CASCADE'],
                [['id_alasan'], 'alasan_pemusnahan', ['id_alasan'], 'CASCADE', 'CASCADE'],
            ],
            [['id_pemusnahan']],
        );
    }
}
