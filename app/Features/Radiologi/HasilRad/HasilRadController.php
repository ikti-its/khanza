<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRad;
use App\Core\Controller\ControllerTemplate;

final class HasilRadController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilRadModel(),
            breadcrumbs: [
                ['title' => 'Radiologi', 'icon' => 'radiologi'],
                ['title' => 'Hasil Radiologi', 'icon' => 'hasil_rad'],
            ],
            judul: 'Hasil Radiologi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Hasil Radiologi',  'id_hasil_rad',        'indeks',  0],
                [1, 'ID Permintaan Rad',   'id_permintaan_rad',   'indeks',  1],
                [1, 'Nomor Registrasi',    'nomor_reg',           'teks',    1],
                [1, 'Kode Dokter PJ',      'kode_dokter_pj',      'teks',    1],
                [1, 'ID Petugas Rad',      'id_petugas_rad',      'teks',    1],
                [1, 'Kode Dokter Perujuk', 'kode_dokter_perujuk', 'teks',    1],
                [1, 'Tanggal & Jam Hasil', 'tgl_jam_hasil',       'tanggal', 1],
                [1, 'Catatan',             'catatan',             'teks',    1],
            ],
        );
    }
}