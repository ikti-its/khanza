<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriaseMacamKasus;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TriaseMacamKasusDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'triase_macam_kasus',
            [
                'id_macam_kasus'   => T::ID(20),
                'kode_macam_kasus' => T::CODE(3),
                'nama_macam_kasus' => T::NAME(100),
            ],
            'id_macam_kasus',
            ['kode_macam_kasus', 'nama_macam_kasus'],
            [],
            true,
            'triase_macam_kasus.csv'
        );
    }
}
