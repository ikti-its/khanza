<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorSteward;
use App\Core\Controller\ControllerTemplate;

class SkorStewardController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SkorStewardModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Skor Steward', 'icon' => 'skor_steward'],
            ],
            judul: 'Skor Steward',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Skor Steward', 'id_skor_steward',    'indeks',  0],
                [1, 'Nomor Registrasi', 'nomor_reg',          'teks',    1],
                [1, 'Waktu Penilaian',  'waktu_penilaian',    'tanggal', 1],
                [1, 'ID Petugas',       'id_petugas',         'teks',    1],
                [1, 'Dokter Anestesi',  'id_dokter_anestesi', 'teks',    1],
                [1, 'Skor Kesadaran',   'skor_kesadaran',     'jumlah',  1],
                [1, 'Skor Respirasi',   'skor_respirasi',     'jumlah',  1],
                [1, 'Skor Motorik',     'skor_motorik',       'jumlah',  1],
                [1, 'Total Skor',       'total_skor',         'jumlah',  1],
                [1, 'Boleh Pindah',     'is_boleh_pindah',    'status',  1],
                [1, 'Catatan Keluar',   'catatan_keluar',     'teks',    1],
                [1, 'Instruksi RR',     'instruksi_rr',       'teks',    1],
            ],
        );
    }
}