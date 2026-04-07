<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\PemusnahanDarah;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePemusnahanDarahTable extends Template
{
    public function __construct(){
        parent::__construct(
            'pemusnahan',
            'pemusnahan_darah',
            [
                'id_pemusnahan'         => T::ID32(),
                'tanggal_pemusnahan'    => T::DATE(),
                'id_petugas'            => T::INT32(),
                'keterangan'            => T::TEXT()->nullable(),
            ],
            ['id_pemusnahan'],
            [],
            [
                // [['id_petugas'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
