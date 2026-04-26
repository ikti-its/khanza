<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriUsiaLab;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefKategoriUsiaLabController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKategoriUsiaLabModel(),
            [
                ['Laboratorium', 'laboratorium'],
                ['Referensi Kategori Usia Lab', 'ref_kategori_usia_lab'],
            ],
            'Referensi Kategori Usia Lab',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_kategori_usia', 'ID Kategori Usia'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kategori_usia', 'Nama Kategori Usia'],
            ],
        );
    }
}