<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\PemusnahanDarahDetail;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreatePemusnahanDarahDetailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan',
            'pemusnahan_darah_detail',
            [
                'id_pemusnahan_detail'  => T::ID32(),
                'id_pemusnahan'         => T::ID32(),
                'id_kantong'            => T::ID32(),
                'id_alasan'             => T::ID8(),
            ],
            ['id_pemusnahan_detail'],
            [['id_kantong']],
            [
                [['id_pemusnahan'], 'pemusnahan_darah', ['id_pemusnahan'], 'CASCADE', 'CASCADE'],
                [['id_kantong'], 'inventori.kantong_darah_utama', ['id_kantong'], 'CASCADE', 'CASCADE'],
                [['id_alasan'], 'alasan_pemusnahan', ['id_alasan'], 'CASCADE', 'CASCADE'],
            ],
            [['id_pemusnahan']],
        );
    }
}
