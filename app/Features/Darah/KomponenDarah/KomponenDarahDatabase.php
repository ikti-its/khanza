<?php
declare(strict_types=1);

namespace App\Features\Darah\KomponenDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class KomponenDarahDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'komponen_darah',
            [
                'id_komponen'           => T::ID8(20),
                'kode_komponen'         => T::CODE(),
                'nama_komponen'         => T::NAME(),
                'masa_berlaku_hari'     => T::INT16(),
            ],
            'id_komponen',
            ['kode_komponen'],
            [],
            true,
            'komponen_darah.csv'
        );
    }
}
