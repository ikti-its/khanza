<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKesadaran;
use App\Core\Controller\ControllerTemplate;

class RefSkriningKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningKesadaranModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Kesadaran', 'icon' => 'ref_skrining_kesadaran'],
            ],
            judul: 'Referensi Skrining Kesadaran',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Kesadaran', 'id_kesadaran', 'indeks', 0],
                [1, 'Kesadaran',    'kesadaran',    'teks',   1],
            ],
        );
    }
}