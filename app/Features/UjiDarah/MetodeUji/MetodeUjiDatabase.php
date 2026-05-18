<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\MetodeUji;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class MetodeUjiDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'uji_darah',
            'metode_uji',
            [
                'id_metode_uji' => T::ID(10),
                'nama_metode'   => T::NAME(35),
            ],
            'id_metode_uji',
            ['nama_metode'],
            [],
            true,
            'metode_uji.csv'
        );
    }
}
