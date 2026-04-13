<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabMb;
use App\Core\Controller\ControllerTemplate;

class HasilLabMbController extends ControllerTemplate
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
                [0, 'ID Hasil MB',              'id_hasil_mb',              'indeks',  0],
                [1, 'ID Permintaan Lab',        'id_permintaan_lab',        'indeks',  1],
                [1, 'Nomor Registrasi',         'nomor_reg',                'teks',    1],
                [1, 'Kode Dokter PJ',           'kode_dokter_pj',           'teks',    1],
                [1, 'ID Petugas Lab',           'id_petugas_lab',           'teks',    1],
                [1, 'Kode Dokter Perujuk',      'kode_dokter_perujuk',      'teks',    1],
                [1, 'Tanggal & Jam Hasil',      'tgl_jam_hasil',            'tanggal', 1],
                [1, 'ID Item Pemeriksaan',      'id_item_pemeriksaan',      'indeks',  1],
                [1, 'ID Parameter Pemeriksaan', 'id_parameter_pemeriksaan', 'indeks',  1],
                [1, 'Nilai Hasil',              'nilai_hasil',              'teks',    1],
                [1, 'Keterangan Hasil',         'keterangan_hasil',         'teks',    1],
            ],
        );
    }
}