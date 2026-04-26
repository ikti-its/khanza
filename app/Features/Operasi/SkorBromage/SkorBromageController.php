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
                [HIDE, OPTIONAL, I::INDEX, 'id_skor_bromage', 'ID Skor Bromage'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::DATE, 'waktu_penilaian', 'Waktu Penilaian'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas', 'ID Petugas'],
                [SHOW, REQUIRED, I::TEXT, 'id_dokter_anestesi', 'Dokter Anestesi'],
                [SHOW, REQUIRED, I::NUMBER, 'skor_bromage', 'Skor Bromage'],
                [SHOW, REQUIRED, I::SELECT, 'is_boleh_pindah', 'Boleh Pindah'],
                [SHOW, REQUIRED, I::TEXT, 'catatan_keluar', 'Catatan Keluar'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_rr', 'Instruksi RR'],
            ],
        );
    }
}