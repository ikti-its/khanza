<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\SumberDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class SumberDarahDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'inventori_darah',
            'sumber_darah',
            [
                'id_sumber_darah'   => T::ID(5),
                'nama_sumber_darah' => T::NAME(20),
            ],
            'id_sumber_darah',
            ['nama_sumber_darah'],
            [],
            true,
            'sumber_darah.csv'
        );
    }
}
