<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\PemusnahanDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePemusnahanDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan',
            'pemusnahan_darah',
            [
                'id_pemusnahan'         => T::ID32(),
                'tanggal_pemusnahan'    => T::DATE(),
                'id_petugas'            => T::UUID(),
                'keterangan'            => T::TEXT()->nullable(),
            ],
            'id_pemusnahan',
            [],
            [
                // ['id_petugas', 'role.petugas', 'id_petugas'],
            ],
        );
    }
}
