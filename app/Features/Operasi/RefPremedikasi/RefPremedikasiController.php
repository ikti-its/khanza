<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPremedikasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefPremedikasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefPremedikasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Premedikasi', 'icon' => 'ref_premedikasi'],
            ],
            judul: 'Referensi Premedikasi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_premedikasi', 'ID Premedikasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_premedikasi', 'Nama Premedikasi'],
            ],
        );
    }
}