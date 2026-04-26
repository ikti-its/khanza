<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefInduksi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefInduksiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefInduksiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Induksi', 'icon' => 'ref_induksi'],
            ],
            title: 'Referensi Induksi',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_induksi', 'ID Induksi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_induksi', 'Nama Induksi'],
            ],
        );
    }
}