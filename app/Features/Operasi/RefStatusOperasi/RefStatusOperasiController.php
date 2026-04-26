<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefStatusOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Status Operasi', 'icon' => 'ref_status_operasi'],
            ],
            judul: 'Referensi Status Operasi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status', 'ID Status'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status', 'Nama Status'],
            ],
        );
    }
}