<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\AlasanPemusnahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateAlasanPemusnahanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan',
            'alasan_pemusnahan',
            [
                'id_alasan'        => T::ID8(),
                'nama_alasan'      => T::TEXT(),
            ],
            'id_alasan',
            'nama_alasan',
            [],
            true,
            __DIR__ . '/alasan_pemusnahan.csv'
        );
    }
}
