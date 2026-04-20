<?php
declare(strict_types=1);

namespace App\Features\Donor\LokasiPengambilanDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateLokasiPengambilanDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'lokasi_pengambilan_darah',
            [
                'id_lokasi_pengambilan'    => T::ID8(),
                'nama_lokasi'              => T::TEXT(),
            ],
            'id_lokasi_pengambilan',
            'nama_lokasi',
            [],
            true,
            __DIR__ . '/lokasi_pengambilan_darah.csv'
        );
    }
}
