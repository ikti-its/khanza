<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabMb;
use App\Core\Controller\ControllerTemplate;

final class HasilLabMbController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilLabMbModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Hasil Lab MB', 'icon' => 'hasil_lab_mb'],
            ],
            judul: 'Hasil Lab MB',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [HIDE, 'ID Hasil MB',              'id_hasil_mb',              'indeks',  OPTIONAL],
                [SHOW, 'ID Permintaan Lab',        'id_permintaan_lab',        'indeks',  REQUIRED],
                [SHOW, 'Nomor Registrasi',         'nomor_reg',                'teks',    REQUIRED],
                [SHOW, 'Kode Dokter PJ',           'kode_dokter_pj',           'teks',    REQUIRED],
                [SHOW, 'ID Petugas Lab',           'id_petugas_lab',           'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Perujuk',      'kode_dokter_perujuk',      'teks',    REQUIRED],
                [SHOW, 'Tanggal & Jam Hasil',      'tgl_jam_hasil',            'tanggal', REQUIRED],
                [SHOW, 'ID Item Pemeriksaan',      'id_item_pemeriksaan',      'indeks',  REQUIRED],
                [SHOW, 'ID Parameter Pemeriksaan', 'id_parameter_pemeriksaan', 'indeks',  REQUIRED],
                [SHOW, 'Nilai Hasil',              'nilai_hasil',              'teks',    REQUIRED],
                [SHOW, 'Keterangan Hasil',         'keterangan_hasil',         'teks',    REQUIRED],
            ],
        );
    }
}