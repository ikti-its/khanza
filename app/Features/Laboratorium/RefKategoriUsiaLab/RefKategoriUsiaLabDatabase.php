<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriUsiaLab;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class RefKategoriUsiaLabDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'laboratorium',
            'ref_kategori_usia_lab',
            [
                'id_kategori_usia' => T::ID8(10),
                'nama_kategori_usia' => T::TEXT(),
            ],
            'id_kategori_usia',
            [],
            [],
            true,
            'kategori_usia_lab.csv'
        );
    }
}
