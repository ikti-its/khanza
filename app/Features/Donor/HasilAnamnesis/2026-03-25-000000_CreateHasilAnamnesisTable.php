<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateHasilAnamnesisTable extends Template
{
    public function __construct(){
        parent::__construct(
            'donor',
            'hasil_anamnesis',
            [
                'id_hasil'      => T::ID8(),
                'nama_hasil'    => T::TEXT(),
            ],
            ['id_hasil'],
            [['nama_hasil']],
            [],
            [],
            true,
            __DIR__ . '/hasil_anamnesis.csv'
        );
    }
}
