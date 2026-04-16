<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPremedikasi;
use App\Core\Controller\ControllerTemplate;

class RefPremedikasiController extends ControllerTemplate
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
                [0, 'ID Premedikasi',   'id_premedikasi',   'indeks', 0],
                [1, 'Nama Premedikasi', 'nama_premedikasi', 'teks',   1],
            ],
        );
    }
}