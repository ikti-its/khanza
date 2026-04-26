<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmumTransfer;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefKeadaanUmumTransferController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKeadaanUmumTransferModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Keadaan Umum Transfer', 'ref_keadaan_umum_transfer'],
            ],
            title: 'Referensi Keadaan Umum Transfer',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_keadaan_umum', 'ID Keadaan Umum'],
                [SHOW, REQUIRED, I::TEXT, 'nama_keadaan', 'Nama Keadaan'],
            ],
        );
    }
}