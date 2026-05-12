<?php
declare(strict_types=1);

namespace App\Features\Darah\GolonganDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class GolonganDarahDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'darah',
            'golongan_darah',
            [
                'id_golongan_darah'      => T::ID(5),
                'nama_golongan_darah'    => T::CODE(2),
            ],
            'id_golongan_darah',
            ['nama_golongan_darah'],
            [],
            true,
            'golongan_darah.csv'
        );
    }
}
