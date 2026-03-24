<?php
declare(strict_types=1);

namespace App\Features\Donor\KesimpulanMedis;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateKesimpulanMedisTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'kesimpulan_medis',
            [
                'id_kesimpulan'      => T::ID8(),
                'nama_kesimpulan'    => T::TEXT(),
            ],
            ['id_kesimpulan'],
            [['nama_kesimpulan']],
            [],
            [],
            true,
            __DIR__ . '/kesimpulan_medis.csv'
        );
    }
}
