<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMetodeTransfer;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
            judul: 'Referensi Metode Transfer',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_metode', 'ID Metode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_metode', 'Nama Metode'],
            ],
        );
    }
}