<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmum;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefKeadaanUmumController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefKeadaanUmumModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Keadaan Umum', 'ref_keadaan_umum'],
            ],
            'Referensi Keadaan Umum',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_keadaan_umum', 'ID Keadaan Umum'],
                [SHOW, REQUIRED, I::TEXT, 'nama_keadaan', 'Nama Keadaan'],
            ],
        );
    }
}