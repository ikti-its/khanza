<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\AlasanPemusnahan;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateAlasanPemusnahanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan',
            'alasan_pemusnahan',
            [
                'id_alasan'        => T::ID8(),
                'nama_alasan'      => T::TEXT(),
            ],
            ['id_alasan'],
            [['nama_alasan']],
            [],
            [],
            true,
            __DIR__ . '/alasan_pemusnahan.csv'
        );
    }
}
