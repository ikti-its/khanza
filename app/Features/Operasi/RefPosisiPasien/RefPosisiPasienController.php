<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPosisiPasien;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefPosisiPasienController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefPosisiPasienModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Posisi Pasien', 'ref_posisi_pasien'],
            ],
            'Referensi Posisi Pasien',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_posisi', 'ID Posisi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_posisi', 'Nama Posisi'],
            ],
        );
    }
}