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
            title: 'Skor Aldrette',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_skor_aldrette', 'ID Skor Aldrette'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::DATE, 'waktu_penilaian', 'Waktu Penilaian'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas', 'ID Petugas'],
                [SHOW, REQUIRED, I::TEXT, 'id_dokter_anestesi', 'Dokter Anestesi'],
                [SHOW, REQUIRED, I::NUMBER, 'skor_aktivitas', 'Skor Aktivitas'],
                [SHOW, REQUIRED, I::NUMBER, 'skor_respirasi', 'Skor Respirasi'],
                [SHOW, REQUIRED, I::NUMBER, 'skor_tekanan_darah', 'Skor Tekanan Darah'],
                [SHOW, REQUIRED, I::NUMBER, 'skor_kesadaran', 'Skor Kesadaran'],
                [SHOW, REQUIRED, I::NUMBER, 'skor_warna_kulit', 'Skor Warna Kulit'],
                [SHOW, REQUIRED, I::NUMBER, 'total_skor', 'Total Skor'],
                [SHOW, REQUIRED, I::SELECT, 'is_boleh_pindah', 'Boleh Pindah'],
                [SHOW, REQUIRED, I::TEXT, 'catatan_keluar', 'Catatan Keluar'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_rr', 'Instruksi RR'],
            ],
        );
    }
}