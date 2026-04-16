<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardKesadaran;
use App\Core\Controller\ControllerTemplate;

class RefStewardKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStewardKesadaranModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Steward Kesadaran', 'icon' => 'ref_steward_kesadaran'],
            ],
            judul: 'Referensi Steward Kesadaran',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Kesadaran', 'id_kesadaran', 'indeks', 0],
                [1, 'Nama Skala',   'nama_skala',   'teks',   1],
                [1, 'Nilai',        'nilai',        'jumlah', 1],
            ],
        );
    }
}