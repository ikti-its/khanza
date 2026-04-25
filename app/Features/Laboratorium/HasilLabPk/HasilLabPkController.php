<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabPk;
use App\Core\Controller\ControllerTemplate;

final class HasilLabPkController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilLabPkModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Hasil Lab PK', 'icon' => 'hasil_lab_pk'],
            ],
            judul: 'Hasil Lab PK',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [0, 'ID Hasil PK',              'id_hasil_pk',              'indeks',  0],
                [1, 'ID Permintaan Lab',        'id_permintaan_lab',        'indeks',  1],
                [1, 'Nomor Registrasi',         'nomor_reg',                'teks',    1],
                [1, 'Kode Dokter PJ',           'kode_dokter_pj',           'teks',    1],
                [1, 'ID Petugas Lab',           'id_petugas_lab',           'teks',    1],
                [1, 'Kode Dokter Perujuk',      'kode_dokter_perujuk',      'teks',    1],
                [1, 'Tanggal & Jam Hasil',      'tgl_jam_hasil',            'tanggal', 1],
                [1, 'ID Kategori Usia',         'id_kategori_usia',         'indeks',  1],
                [1, 'ID Item Pemeriksaan',      'id_item_pemeriksaan',      'indeks',  1],
                [1, 'ID Parameter Pemeriksaan', 'id_parameter_pemeriksaan', 'indeks',  1],
                [1, 'Nilai Hasil',              'nilai_hasil',              'teks',    1],
                [1, 'Keterangan Hasil',         'keterangan_hasil',         'teks',    0],
            ],
        );
    }
}