<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorSteward;
use App\Core\Controller\ControllerTemplate;

final class SkorStewardController extends ControllerTemplate
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
                [HIDE, 'ID Skor Steward', 'id_skor_steward',    'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi', 'nomor_reg',          'teks',    REQUIRED],
                [SHOW, 'Waktu Penilaian',  'waktu_penilaian',    'tanggal', REQUIRED],
                [SHOW, 'ID Petugas',       'id_petugas',         'teks',    REQUIRED],
                [SHOW, 'Dokter Anestesi',  'id_dokter_anestesi', 'teks',    REQUIRED],
                [SHOW, 'Skor Kesadaran',   'skor_kesadaran',     'jumlah',  REQUIRED],
                [SHOW, 'Skor Respirasi',   'skor_respirasi',     'jumlah',  REQUIRED],
                [SHOW, 'Skor Motorik',     'skor_motorik',       'jumlah',  REQUIRED],
                [SHOW, 'Total Skor',       'total_skor',         'jumlah',  REQUIRED],
                [SHOW, 'Boleh Pindah',     'is_boleh_pindah',    'status',  REQUIRED],
                [SHOW, 'Catatan Keluar',   'catatan_keluar',     'teks',    REQUIRED],
                [SHOW, 'Instruksi RR',     'instruksi_rr',       'teks',    REQUIRED],
            ],
        );
    }
}