<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorBromage;
use App\Core\Controller\ControllerTemplate;

class SkorBromageController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SkorBromageModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Skor Bromage', 'icon' => 'skor_bromage'],
            ],
            judul: 'Skor Bromage',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Skor Bromage', 'id_skor_bromage',    'indeks',  0],
                [1, 'Nomor Registrasi', 'nomor_reg',          'teks',    1],
                [1, 'Waktu Penilaian',  'waktu_penilaian',    'tanggal', 1],
                [1, 'ID Petugas',       'id_petugas',         'teks',    1],
                [1, 'Dokter Anestesi',  'id_dokter_anestesi', 'teks',    1],
                [1, 'Skor Bromage',     'skor_bromage',       'jumlah',  1],
                [1, 'Boleh Pindah',     'is_boleh_pindah',    'status',  1],
                [1, 'Catatan Keluar',   'catatan_keluar',     'teks',    1],
                [1, 'Instruksi RR',     'instruksi_rr',       'teks',    1],
            ],
        );
    }
}