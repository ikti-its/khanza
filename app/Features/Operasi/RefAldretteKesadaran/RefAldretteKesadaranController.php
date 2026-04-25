<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefAldretteKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAldretteKesadaranModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Aldrette Kesadaran', 'icon' => 'ref_aldrette_kesadaran'],
            ],
            judul: 'Referensi Aldrette Kesadaran',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Kesadaran', 'id_kesadaran', 'indeks', OPTIONAL],
                [SHOW, 'Nama Skala',   'nama_skala',   'teks',   REQUIRED],
                [SHOW, 'Nilai',        'nilai',        'jumlah', REQUIRED],
            ],
        );
    }
}