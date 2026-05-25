<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TingkatSkala;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TingkatSkalaDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'triase_ugd',
            'tingkat_skala',
            [
                'id_tingkat'   => T::ID(5),
                'nama_tingkat' => T::NAME(10),
            ],
            'id_tingkat',
            ['nama_tingkat'],
            [],
            true,
            'tingkat_skala.csv',
        );
    }
}
