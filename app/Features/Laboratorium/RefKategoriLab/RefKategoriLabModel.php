<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriLab;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKategoriLabModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKategoriLabDatabase(),
            'REFS',
            'laboratorium',
            'ref_kategori_lab',
            'id_kategori',
            [
                'id_kategori'   => V::DEFAULT(),
                'kode_kategori' => V::DEFAULT(),
                'nama_kategori' => V::DEFAULT(),
            ],
            []
        );
    }
}