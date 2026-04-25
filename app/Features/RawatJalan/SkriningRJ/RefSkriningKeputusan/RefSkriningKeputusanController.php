<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefSkriningKeputusanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningKeputusanModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Keputusan', 'icon' => 'ref_skrining_keputusan'],
            ],
            judul: 'Referensi Skrining Keputusan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Keputusan',       'id_keputusan',       'indeks', OPTIONAL],
                [SHOW, 'Skrining Keputusan', 'skrining_keputusan', 'teks',   REQUIRED],
            ],
        );
    }
}