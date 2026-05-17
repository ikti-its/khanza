<?php
declare(strict_types=1);

namespace App\Features\Finansial\MetodePembayaran;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class MetodePembayaranDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'metode',
            [
                'id_metode'   => T::ID(5),
                'nama_metode' => T::NAME(20),       
                'biaya'       => T::MONEY(),
            ],
            'id_metode',
            ['nama_metode'],
            [],
        );
    }
}
