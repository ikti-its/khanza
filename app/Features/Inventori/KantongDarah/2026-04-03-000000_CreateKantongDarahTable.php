<?php
declare(strict_types=1);

namespace App\Features\Inventori\KantongDarah;

use App\Core\DatabaseTemplate;
use App\Core\DatabaseType as T;

class CreateKantongDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori',
            'kantong_darah',
            [
                'id_bag'                   => T::ID32(),
                'id_pengambilan_darah'     => T::ID32(),
                'no_bag'                   => T::TEXT(),
                'id_jenis_bag'             => T::ID8(),
            ],
            ['id_bag'],
            [['id_pengambilan_darah'], ['no_bag']],
            [
                [['id_pengambilan_darah'], 'donor.pengambilan_darah', ['id_pengambilan_darah'], 'CASCADE', 'CASCADE'],
                [['id_jenis_bag'], 'jenis_bag', ['id_jenis_bag'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
