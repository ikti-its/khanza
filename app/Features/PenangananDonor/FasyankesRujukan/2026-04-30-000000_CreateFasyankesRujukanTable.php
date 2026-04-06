<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateFasyankesRujukanTable extends Template
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'fasyankes_rujukan',
            [
                'id_fasyankes'      => T::ID16(),
                'nama_fasyankes'    => T::TEXT(),
                'id_alamat'         => T::ID32(),
                'kode_pos'          => T::TEXT(),
            ],
            ['id_fasyankes'],
            [],
            [
                [['id_alamat'], 'lokasi.alamat', ['id_alamat'], 'CASCADE', 'CASCADE'],
            ],
            [['nama_fasyankes']],
        );
    }
}
