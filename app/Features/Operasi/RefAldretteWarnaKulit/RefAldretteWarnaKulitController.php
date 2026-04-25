<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteWarnaKulit;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefAldretteWarnaKulitController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAldretteWarnaKulitModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Aldrette Warna Kulit', 'icon' => 'ref_aldrette_warna_kulit'],
            ],
            judul: 'Referensi Aldrette Warna Kulit',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Warna',  'id_warna',   I::INDEX, OPTIONAL],
                [SHOW, 'Nama Skala','nama_skala', I::TEXT,   REQUIRED],
                [SHOW, 'Nilai',     'nilai',      I::NUMBER, REQUIRED],
            ],
        );
    }
}