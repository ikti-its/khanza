<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningSkalaNyeri;
use App\Core\Controller\ControllerTemplate;

class RefSkriningSkalaNyeriController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningSkalaNyeriModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Skala Nyeri', 'icon' => 'ref_skrining_skala_nyeri'],
            ],
            judul: 'Referensi Skrining Skala Nyeri',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Skala Nyeri', 'id_skala_nyeri', 'indeks', 0],
                [1, 'Skala Nyeri',    'skala_nyeri',    'teks',   1],
            ],
        );
    }
}