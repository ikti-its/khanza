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
                [HIDE, 'ID Skrining',      'id_skrining',      I::INDEX,  OPTIONAL],
                [SHOW, 'No. Rekam Medis',  'no_rm',            I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal Skrining', 'tgl_jam_skrining', I::DATE, REQUIRED],
                [SHOW, 'Kesadaran',        'id_kesadaran',     I::INDEX,  REQUIRED],
                [SHOW, 'Pernafasan',       'id_pernafasan',    I::INDEX,  REQUIRED],
                [SHOW, 'Skala Nyeri',      'id_skala_nyeri',   I::INDEX,  REQUIRED],
                [SHOW, 'Nyeri Dada',       'id_nyeri_dada',    I::INDEX,  REQUIRED],
                [SHOW, 'Batuk',            'id_batuk',         I::INDEX,  REQUIRED],
                [SHOW, 'Geriatri',         'is_geriatri',      I::SELECT,  REQUIRED],
                [SHOW, 'Risiko Jatuh',     'is_risiko_jatuh',  I::SELECT,  REQUIRED],
                [SHOW, 'Keputusan',        'id_keputusan',     I::INDEX,  REQUIRED],
                [SHOW, 'ID Petugas',       'id_petugas',       I::TEXT,    REQUIRED],
            ],
        );
    }
}