<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefObatBebas;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefObatBebasController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefObatBebasModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Obat Bebas', 'ref_obat_bebas'],
            ],
            'Referensi Obat Bebas',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_obat_bebas', 'ID Obat Bebas'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kategori', 'Nama Kategori'],
            ],
        );
    }
}