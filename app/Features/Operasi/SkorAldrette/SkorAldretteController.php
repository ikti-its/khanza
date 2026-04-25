<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorAldrette;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class SkorAldretteController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SkorAldretteModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Skor Aldrette', 'icon' => 'skor_aldrette'],
            ],
            judul: 'Skor Aldrette',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Skor Aldrette',   'id_skor_aldrette',   'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',    'nomor_reg',          'teks',    REQUIRED],
                [SHOW, 'Waktu Penilaian',     'waktu_penilaian',    'tanggal', REQUIRED],
                [SHOW, 'ID Petugas',          'id_petugas',         'teks',    REQUIRED],
                [SHOW, 'Dokter Anestesi',     'id_dokter_anestesi', 'teks',    REQUIRED],
                [SHOW, 'Skor Aktivitas',      'skor_aktivitas',     'jumlah',  REQUIRED],
                [SHOW, 'Skor Respirasi',      'skor_respirasi',     'jumlah',  REQUIRED],
                [SHOW, 'Skor Tekanan Darah',  'skor_tekanan_darah', 'jumlah',  REQUIRED],
                [SHOW, 'Skor Kesadaran',      'skor_kesadaran',     'jumlah',  REQUIRED],
                [SHOW, 'Skor Warna Kulit',    'skor_warna_kulit',   'jumlah',  REQUIRED],
                [SHOW, 'Total Skor',          'total_skor',         'jumlah',  REQUIRED],
                [SHOW, 'Boleh Pindah',        'is_boleh_pindah',    'status',  REQUIRED],
                [SHOW, 'Catatan Keluar',      'catatan_keluar',     'teks',    REQUIRED],
                [SHOW, 'Instruksi RR',        'instruksi_rr',       'teks',    REQUIRED],
            ],
        );
    }
}