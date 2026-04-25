<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefWarnaUrine;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefWarnaUrineController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefWarnaUrineModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Warna Urine', 'icon' => 'ref_warna_urine'],
            ],
            judul: 'Referensi Warna Urine',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Warna Urine', 'id_warna_urine', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Warna',     'nama_warna',     I::TEXT,   REQUIRED],
            ],
        );
    }
}