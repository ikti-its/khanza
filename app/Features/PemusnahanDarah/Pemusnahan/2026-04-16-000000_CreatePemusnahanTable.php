<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\Pemusnahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePemusnahanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan_darah',
            'pemusnahan',
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
