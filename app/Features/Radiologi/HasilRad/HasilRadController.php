<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRad;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Hasil Radiologi',  'id_hasil_rad',        I::INDEX,  OPTIONAL],
                [SHOW, 'ID Permintaan Rad',   'id_permintaan_rad',   I::INDEX,  REQUIRED],
                [SHOW, 'Nomor Registrasi',    'nomor_reg',           I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter PJ',      'kode_dokter_pj',      I::TEXT,    REQUIRED],
                [SHOW, 'ID Petugas Rad',      'id_petugas_rad',      I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Perujuk', 'kode_dokter_perujuk', I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal & Jam Hasil', 'tgl_jam_hasil',       I::DATE, REQUIRED],
                [SHOW, 'Catatan',             'catatan',             I::TEXT,    REQUIRED],
            ],
        );
    }
}