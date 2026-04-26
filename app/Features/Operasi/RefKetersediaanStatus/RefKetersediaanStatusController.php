<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKetersediaanStatus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKetersediaanStatusController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKetersediaanStatusModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Ketersediaan Status', 'icon' => 'ref_ketersediaan_status'],
            ],
            judul: 'Referensi Ketersediaan Status',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_ketersediaan_status', 'ID Ketersediaan Status'],
                [SHOW, REQUIRED, I::TEXT, 'nama_ketersediaan', 'Nama Ketersediaan'],
            ],
        );
    }
}