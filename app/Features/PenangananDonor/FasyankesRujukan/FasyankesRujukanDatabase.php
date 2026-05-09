<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class FasyankesRujukanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'fasyankes_rujukan',
            [
                'id_fasyankes'   => T::ID16(5_000),
                'nama_fasyankes' => T::TEXT(),
                'id_alamat'      => T::FK_AUTO(),
                'kode_pos'       => T::TEXT(),
            ],
            'id_fasyankes',
            [],
            [
                [
                    'id_alamat', 
                    \App\Features\Lokasi\Alamat\AlamatDatabase::class, 
                    'id_alamat'
                ],
            ],
            false,
            'fasyankes_rujukan.csv'
        );
    }
}
