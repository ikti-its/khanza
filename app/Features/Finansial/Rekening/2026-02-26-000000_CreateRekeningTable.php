<?php
declare(strict_types=1);

namespace App\Features\Finansial\Rekening;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateRekeningTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'finansial',
            'rekening',
            [
                'id_rekening'      => T::ID8(),
                'nama_rekening'    => T::TEXT(),
            ],
            ['id_rekening'],
            [['nama_rekening']],
        );
    }
}
