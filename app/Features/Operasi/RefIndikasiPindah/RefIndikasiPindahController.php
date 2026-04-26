<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefIndikasiPindah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefIndikasiPindahController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefIndikasiPindahModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Indikasi Pindah', 'ref_indikasi_pindah'],
            ],
            title: 'Referensi Indikasi Pindah',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_indikasi', 'ID Indikasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_indikasi', 'Nama Indikasi'],
            ],
        );
    }
}