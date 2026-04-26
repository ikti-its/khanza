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
            model: new RefPeralatanTransferModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Peralatan Transfer', 'icon' => 'ref_peralatan_transfer'],
            ],
            title: 'Referensi Peralatan Transfer',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_peralatan', 'ID Peralatan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_peralatan', 'Nama Peralatan'],
            ],
        );
    }
}