<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriUsiaLab;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKategoriUsiaLabModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKategoriUsiaLabDatabase(),
            'REFS',
            'laboratorium',
            'ref_kategori_usia_lab',
            'id_kategori_usia',
            [
                'id_kategori_usia'      => V::DEFAULT(),
                'nama_kategori_usia'    => V::DEFAULT(),
            ],
            []  
        );
    }
}