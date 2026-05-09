<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\CaraMasuk;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class CaraMasukDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'cara_masuk',
            [
                'id_cara'   => T::ID8(10),
                'nama_cara' => T::TEXT(),
            ],
            'id_cara',
            ['nama_cara'],
            [],
            true,
            'cara_masuk.csv'
        );
    }
}
