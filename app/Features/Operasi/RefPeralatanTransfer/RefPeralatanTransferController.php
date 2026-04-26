<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPeralatanTransfer;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefPeralatanTransferController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefPeralatanTransferModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Peralatan Transfer', 'ref_peralatan_transfer'],
            ],
            'Referensi Peralatan Transfer',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_peralatan', 'ID Peralatan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_peralatan', 'Nama Peralatan'],
            ],
        );
    }
}