<?php
declare(strict_types=1);

namespace App\Features\Darah\KomponenDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateKomponenDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'komponen_darah',
            [
                'id_komponen'           => T::ID8(),
                'kode_komponen'         => T::TEXT(),
                'nama_komponen'         => T::TEXT(),
                'masa_berlaku_hari'     => T::INT16(),
            ],
            'id_komponen',
            'kode_komponen',
            [],
            true,
            __DIR__ . '/komponen_darah.csv'
        );
    }
}
