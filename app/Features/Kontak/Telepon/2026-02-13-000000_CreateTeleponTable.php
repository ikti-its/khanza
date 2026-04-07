<?php
declare(strict_types=1);

namespace App\Features\Kontak\Telepon;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateTeleponTable extends Template
{
    public function __construct(){
        parent::__construct(
            'kontak',
            'telepon',
            [
                'id_telepon'    => T::ID32(),
                'id_orang'      => T::INT32(),
                'nomor_telepon' => T::TEXT(),
                'jenis_telepon' => T::INT8(),
                'id_provider'   => T::INT8(),
            ],
            ['id_telepon'],
            [['nomor_telepon']],
            [
                [['id_orang'], 'person.orang', ['id_orang'], 'CASCADE', 'CASCADE'],
                [['jenis_telepon'], 'jenis_telepon', ['id_jenis_telepon'], 'CASCADE', 'CASCADE'],
                [['id_provider'], 'provider', ['id_provider'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
