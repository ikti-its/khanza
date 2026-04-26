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
                [HIDE, OPTIONAL, I::INDEX, 'id_warna_urine', 'ID Warna Urine'],
                [SHOW, REQUIRED, I::TEXT, 'nama_warna', 'Nama Warna'],
            ],
        );
    }
}