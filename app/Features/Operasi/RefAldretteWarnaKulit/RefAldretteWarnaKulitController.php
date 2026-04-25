<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteWarnaKulit;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Warna',  'id_warna',   'indeks', 0],
                [1, 'Nama Skala','nama_skala', 'teks',   1],
                [1, 'Nilai',     'nilai',      'jumlah', 1],
            ],
        );
    }
}