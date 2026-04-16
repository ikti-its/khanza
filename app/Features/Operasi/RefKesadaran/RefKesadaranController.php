<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaran;
use App\Core\Controller\ControllerTemplate;

class RefKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKesadaranModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Kesadaran', 'icon' => 'ref_kesadaran'],
            ],
            judul: 'Referensi Kesadaran',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Kesadaran',   'id_kesadaran',   'indeks', 0],
                [1, 'Nama Kesadaran', 'nama_kesadaran', 'teks',   1],
            ],
        );
    }
}