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
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Keadaan Umum Transfer', 'icon' => 'ref_keadaan_umum_transfer'],
            ],
            title: 'Referensi Keadaan Umum Transfer',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_keadaan_umum', 'ID Keadaan Umum'],
                [SHOW, REQUIRED, I::TEXT, 'nama_keadaan', 'Nama Keadaan'],
            ],
        );
    }
}