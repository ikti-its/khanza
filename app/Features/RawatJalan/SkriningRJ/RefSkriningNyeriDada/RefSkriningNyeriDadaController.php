<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningNyeriDada;
use App\Core\Controller\ControllerTemplate;

final class RefSkriningNyeriDadaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningNyeriDadaModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Nyeri Dada', 'icon' => 'ref_skrining_nyeri_dada'],
            ],
            judul: 'Referensi Skrining Nyeri Dada',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Nyeri Dada', 'id_nyeri_dada', 'indeks', OPTIONAL],
                [SHOW, 'Nyeri Dada',    'nyeri_dada',    'teks',   REQUIRED],
            ],
        );
    }
}