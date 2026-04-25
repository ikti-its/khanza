<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\SkriningRawatJalan;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Skrining',      'id_skrining',      'indeks',  0],
                [1, 'No. Rekam Medis',  'no_rm',            'teks',    1],
                [1, 'Tanggal Skrining', 'tgl_jam_skrining', 'tanggal', 1],
                [1, 'Kesadaran',        'id_kesadaran',     'indeks',  1],
                [1, 'Pernafasan',       'id_pernafasan',    'indeks',  1],
                [1, 'Skala Nyeri',      'id_skala_nyeri',   'indeks',  1],
                [1, 'Nyeri Dada',       'id_nyeri_dada',    'indeks',  1],
                [1, 'Batuk',            'id_batuk',         'indeks',  1],
                [1, 'Geriatri',         'is_geriatri',      'status',  1],
                [1, 'Risiko Jatuh',     'is_risiko_jatuh',  'status',  1],
                [1, 'Keputusan',        'id_keputusan',     'indeks',  1],
                [1, 'ID Petugas',       'id_petugas',       'teks',    1],
            ],
        );
    }
}