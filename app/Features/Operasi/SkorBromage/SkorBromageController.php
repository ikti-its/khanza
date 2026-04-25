<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorBromage;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class SkorBromageController extends ControllerTemplate
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
                [HIDE, 'ID Skor Bromage', 'id_skor_bromage',    'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi', 'nomor_reg',          'teks',    REQUIRED],
                [SHOW, 'Waktu Penilaian',  'waktu_penilaian',    'tanggal', REQUIRED],
                [SHOW, 'ID Petugas',       'id_petugas',         'teks',    REQUIRED],
                [SHOW, 'Dokter Anestesi',  'id_dokter_anestesi', 'teks',    REQUIRED],
                [SHOW, 'Skor Bromage',     'skor_bromage',       'jumlah',  REQUIRED],
                [SHOW, 'Boleh Pindah',     'is_boleh_pindah',    'status',  REQUIRED],
                [SHOW, 'Catatan Keluar',   'catatan_keluar',     'teks',    REQUIRED],
                [SHOW, 'Instruksi RR',     'instruksi_rr',       'teks',    REQUIRED],
            ],
        );
    }
}