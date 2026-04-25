<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefSkriningKesadaranController extends ControllerTemplate
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
                [HIDE, 'ID Kesadaran', 'id_kesadaran', 'indeks', OPTIONAL],
                [SHOW, 'Kesadaran',    'kesadaran',    'teks',   REQUIRED],
            ],
        );
    }
}