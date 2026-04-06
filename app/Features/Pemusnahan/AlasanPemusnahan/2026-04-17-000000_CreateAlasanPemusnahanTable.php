<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\AlasanPemusnahan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateAlasanPemusnahanTable extends Template
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
