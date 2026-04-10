<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Konseling;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateKonselingTable extends Template
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'konseling',
            [
                'id_konseling'          => T::ID32(),
                'id_kasus'              => T::INT32(),
                'tanggal_konseling'     => T::DATE(),
                'id_petugas'            => T::UUID(),
            ],
            ['id_konseling'],
            [['id_kasus']],
            [
                [['id_kasus'], 'kasus_reaktif', ['id_kasus'], 'CASCADE', 'CASCADE'],
                // [['id_petugas'], 'role.petugas', ['id_petugas'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
