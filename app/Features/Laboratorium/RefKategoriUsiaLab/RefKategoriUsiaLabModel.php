<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriUsiaLab;

use App\Core\ModelTemplate;

class RefKategoriUsiaLabModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'laboratorium',
            'ref_kategori_usia_lab',
            'id_kategori_usia',
            [
                'id_kategori_usia' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_kategori_usia' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}