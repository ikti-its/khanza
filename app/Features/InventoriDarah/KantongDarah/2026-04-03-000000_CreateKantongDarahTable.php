<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\KantongDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateKantongDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'kantong_darah',
            [
                'id_bag'                   => T::ID32(),
                'id_pengambilan_darah'     => T::INT32(),
                'no_bag'                   => T::TEXT(),
                'id_jenis_bag'             => T::INT8(),
            ],
            ['id_bag'],
            [['id_pengambilan_darah'], ['no_bag']],
            [
                [['id_pengambilan_darah'], 'donor.pengambilan_darah', ['id_pengambilan_darah'], 'CASCADE', 'CASCADE'],
                [['id_jenis_bag'], 'jenis_bag', ['id_jenis_bag'], 'CASCADE', 'CASCADE'],
            ],
            [],
            false,
            __DIR__ . '/kantong_darah.csv'
        );
    }
}
