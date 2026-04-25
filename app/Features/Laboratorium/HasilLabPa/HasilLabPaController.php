<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabPa;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Hasil PA',            'id_hasil_pa',         'indeks',  0],
                [1, 'ID Permintaan Lab',      'id_permintaan_lab',   'indeks',  1],
                [1, 'Nomor Registrasi',       'nomor_reg',           'teks',    1],
                [1, 'Kode Dokter PJ',         'kode_dokter_pj',      'teks',    1],
                [1, 'ID Petugas Lab',         'id_petugas_lab',      'teks',    1],
                [1, 'Kode Dokter Perujuk',    'kode_dokter_perujuk', 'teks',    1],
                [1, 'Tanggal & Jam Hasil',    'tgl_jam_hasil',       'tanggal', 1],
                [1, 'ID Item Pemeriksaan',    'id_item_pemeriksaan', 'indeks',  1],
                [1, 'Diagnosa Klinis',        'diagnosa_klinis',     'teks',    1],
                [1, 'Makroskopik',            'makroskopik',         'teks',    1],
                [1, 'Mikroskopik',            'mikroskopik',         'teks',    1],
                [1, 'Kesimpulan',             'kesimpulan',          'teks',    1],
                [1, 'Kesan',                  'kesan',               'teks',    0],
            ],
        );
    }
}