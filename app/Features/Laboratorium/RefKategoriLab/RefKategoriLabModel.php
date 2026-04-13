<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriLab;

use App\Core\ModelTemplate;

class RefKategoriLabModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'laboratorium',
            'ref_kategori_lab',
            'id_kategori',
            [
                'id_kategori' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_kategori' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_kategori' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}