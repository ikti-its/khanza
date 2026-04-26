<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\PemusnahanDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePemusnahanDetailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'pemusnahan_darah',
            'pemusnahan_detail',
            [
                'id_pemusnahan_detail'  => T::ID32(),
                'id_pemusnahan'         => T::INT32(),
                'id_stok_darah'         => T::INT32(),
                'id_alasan'             => T::INT8(),
            ],
            'id_pemusnahan_detail',
            'id_stok_darah',
            [
                ['id_pemusnahan', 'pemusnahan', 'id_pemusnahan'],
                ['id_stok_darah', 'inventori_darah.stok_darah', 'id_stok_darah'],
                ['id_alasan', 'alasan_pemusnahan', 'id_alasan'],
            ],
        );
    }
}
