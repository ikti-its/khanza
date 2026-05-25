<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class TriasePemeriksaanDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'triase_ugd',
            'triase_pemeriksaan',
            [
                'id_pemeriksaan'   => T::ID(20),
                'kode_pemeriksaan' => T::CODE(3),
                'nama_pemeriksaan' => T::NAME(50),
            ],
            'id_pemeriksaan',
            ['kode_pemeriksaan', 'nama_pemeriksaan'],
            [],
            true,
            'triase_pemeriksaan.csv',
        );
    }
}
