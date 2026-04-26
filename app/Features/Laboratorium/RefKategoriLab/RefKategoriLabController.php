<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefKategoriLab;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefKategoriLabController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKategoriLabModel(),
            breadcrumbs: [
                ['Laboratorium', 'laboratorium'],
                ['Referensi Kategori Lab', 'ref_kategori_lab'],
            ],
            title: 'Referensi Kategori Lab',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kategori', 'ID Kategori'],
                [SHOW, REQUIRED, I::TEXT, 'kode_kategori', 'Kode Kategori'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kategori', 'Nama Kategori'],
            ],
        );
    }
}