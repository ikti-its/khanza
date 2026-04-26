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
            model: new RefPosisiPasienModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Posisi Pasien', 'icon' => 'ref_posisi_pasien'],
            ],
            title: 'Referensi Posisi Pasien',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_posisi', 'ID Posisi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_posisi', 'Nama Posisi'],
            ],
        );
    }
}