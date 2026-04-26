<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMetodeTransfer;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefMetodeTransferController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefMetodeTransferModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Metode Transfer', 'icon' => 'ref_metode_transfer'],
            ],
            title: 'Referensi Metode Transfer',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_metode', 'ID Metode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_metode', 'Nama Metode'],
            ],
        );
    }
}