<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabPa;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilLabPaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilLabPaModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Hasil Lab PA', 'icon' => 'hasil_lab_pa'],
            ],
            judul: 'Hasil Lab PA',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [HIDE, 'ID Hasil PA',            'id_hasil_pa',         'indeks',  OPTIONAL],
                [SHOW, 'ID Permintaan Lab',      'id_permintaan_lab',   'indeks',  REQUIRED],
                [SHOW, 'Nomor Registrasi',       'nomor_reg',           'teks',    REQUIRED],
                [SHOW, 'Kode Dokter PJ',         'kode_dokter_pj',      'teks',    REQUIRED],
                [SHOW, 'ID Petugas Lab',         'id_petugas_lab',      'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Perujuk',    'kode_dokter_perujuk', 'teks',    REQUIRED],
                [SHOW, 'Tanggal & Jam Hasil',    'tgl_jam_hasil',       'tanggal', REQUIRED],
                [SHOW, 'ID Item Pemeriksaan',    'id_item_pemeriksaan', 'indeks',  REQUIRED],
                [SHOW, 'Diagnosa Klinis',        'diagnosa_klinis',     'teks',    REQUIRED],
                [SHOW, 'Makroskopik',            'makroskopik',         'teks',    REQUIRED],
                [SHOW, 'Mikroskopik',            'mikroskopik',         'teks',    REQUIRED],
                [SHOW, 'Kesimpulan',             'kesimpulan',          'teks',    REQUIRED],
                [SHOW, 'Kesan',                  'kesan',               'teks',    OPTIONAL],
            ],
        );
    }
}