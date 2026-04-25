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
                [HIDE, 'ID Hasil PA',            'id_hasil_pa',         I::INDEX,  OPTIONAL],
                [SHOW, 'ID Permintaan Lab',      'id_permintaan_lab',   I::INDEX,  REQUIRED],
                [SHOW, 'Nomor Registrasi',       'nomor_reg',           I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter PJ',         'kode_dokter_pj',      I::TEXT,    REQUIRED],
                [SHOW, 'ID Petugas Lab',         'id_petugas_lab',      I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Perujuk',    'kode_dokter_perujuk', I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal & Jam Hasil',    'tgl_jam_hasil',       I::DATE, REQUIRED],
                [SHOW, 'ID Item Pemeriksaan',    'id_item_pemeriksaan', I::INDEX,  REQUIRED],
                [SHOW, 'Diagnosa Klinis',        'diagnosa_klinis',     I::TEXT,    REQUIRED],
                [SHOW, 'Makroskopik',            'makroskopik',         I::TEXT,    REQUIRED],
                [SHOW, 'Mikroskopik',            'mikroskopik',         I::TEXT,    REQUIRED],
                [SHOW, 'Kesimpulan',             'kesimpulan',          I::TEXT,    REQUIRED],
                [SHOW, 'Kesan',                  'kesan',               I::TEXT,    OPTIONAL],
            ],
        );
    }
}