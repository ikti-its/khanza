<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\SkriningRawatJalan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class SkriningRawatJalanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SkriningRawatJalanModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Skrining Rawat Jalan', 'icon' => 'skrining_rawat_jalan'],
            ],
            judul: 'Skrining Rawat Jalan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Skrining',      'id_skrining',      'indeks',  OPTIONAL],
                [SHOW, 'No. Rekam Medis',  'no_rm',            'teks',    REQUIRED],
                [SHOW, 'Tanggal Skrining', 'tgl_jam_skrining', 'tanggal', REQUIRED],
                [SHOW, 'Kesadaran',        'id_kesadaran',     'indeks',  REQUIRED],
                [SHOW, 'Pernafasan',       'id_pernafasan',    'indeks',  REQUIRED],
                [SHOW, 'Skala Nyeri',      'id_skala_nyeri',   'indeks',  REQUIRED],
                [SHOW, 'Nyeri Dada',       'id_nyeri_dada',    'indeks',  REQUIRED],
                [SHOW, 'Batuk',            'id_batuk',         'indeks',  REQUIRED],
                [SHOW, 'Geriatri',         'is_geriatri',      'status',  REQUIRED],
                [SHOW, 'Risiko Jatuh',     'is_risiko_jatuh',  'status',  REQUIRED],
                [SHOW, 'Keputusan',        'id_keputusan',     'indeks',  REQUIRED],
                [SHOW, 'ID Petugas',       'id_petugas',       'teks',    REQUIRED],
            ],
        );
    }
}