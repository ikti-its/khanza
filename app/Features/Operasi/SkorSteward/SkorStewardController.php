<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorSteward;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Skor Steward', 'id_skor_steward',    I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi', 'nomor_reg',          I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Penilaian',  'waktu_penilaian',    I::DATE, REQUIRED],
                [SHOW, 'ID Petugas',       'id_petugas',         I::TEXT,    REQUIRED],
                [SHOW, 'Dokter Anestesi',  'id_dokter_anestesi', I::TEXT,    REQUIRED],
                [SHOW, 'Skor Kesadaran',   'skor_kesadaran',     I::NUMBER,  REQUIRED],
                [SHOW, 'Skor Respirasi',   'skor_respirasi',     I::NUMBER,  REQUIRED],
                [SHOW, 'Skor Motorik',     'skor_motorik',       I::NUMBER,  REQUIRED],
                [SHOW, 'Total Skor',       'total_skor',         I::NUMBER,  REQUIRED],
                [SHOW, 'Boleh Pindah',     'is_boleh_pindah',    I::SELECT,  REQUIRED],
                [SHOW, 'Catatan Keluar',   'catatan_keluar',     I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi RR',     'instruksi_rr',       I::TEXT,    REQUIRED],
            ],
        );
    }
}