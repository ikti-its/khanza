<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriLab;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefKategoriLabDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'laboratorium',
            'ref_kategori_lab',
            [
                'id_kategori'   => T::ID(10),
                'kode_kategori' => T::CODE(2),
                'nama_kategori' => T::TEXT(),
            ],
            'id_kategori',
            ['kode_kategori'],
            [],
            true,
            'kategori_lab.csv',
        );
    }
}
