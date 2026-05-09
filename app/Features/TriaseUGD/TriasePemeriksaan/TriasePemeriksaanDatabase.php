<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TriasePemeriksaanDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'triase_pemeriksaan',
            [
                'id_pemeriksaan'   => T::ID8(20),
                'kode_pemeriksaan' => T::TEXT(),
                'nama_pemeriksaan' => T::TEXT(),
            ],
            'id_pemeriksaan',
            ['kode_pemeriksaan', 'nama_pemeriksaan'],
            [],
            true,
            'triase_pemeriksaan.csv'
        );
    }
}
