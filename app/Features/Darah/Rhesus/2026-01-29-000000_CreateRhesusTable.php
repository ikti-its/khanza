<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateRhesusTable extends Template
{
    public function __construct(){
        parent::__construct(
            'darah',
            'rhesus',
            [
                'id_rhesus'      => T::ID8(),
                'kode_rhesus'    => T::TEXT(),
            ],
            ['id_rhesus'],
            [['kode_rhesus']],
            [],
            [],
            true,
            __DIR__ . '/rhesus.csv'
        );
    }
}
