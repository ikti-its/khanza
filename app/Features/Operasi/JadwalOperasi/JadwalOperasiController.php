<?php
declare(strict_types=1);

namespace App\Features\Operasi\JadwalOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class JadwalOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new JadwalOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Jadwal Operasi', 'icon' => 'jadwal_operasi'],
            ],
            judul: 'Jadwal Operasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Jadwal',           'id_jadwal',            I::INDEX,  OPTIONAL],
                [SHOW, 'ID Permintaan',       'id_permintaan',        I::INDEX,  REQUIRED],
                [SHOW, 'ID Ruangan',          'id_ruangan',           I::INDEX,  REQUIRED],
                [SHOW, 'ID Tindakan',         'id_tindakan',          I::INDEX,  REQUIRED],
                [SHOW, 'Kode Dokter Bedah',   'kode_dokter_bedah',    I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi','kode_dokter_anestesi', I::TEXT,    REQUIRED],
                [SHOW, I::DATE,             I::DATE,              I::DATE, REQUIRED],
                [SHOW, 'Waktu Mulai',         'waktu_mulai',          I::TIME,     REQUIRED],
                [SHOW, 'Waktu Selesai',       'waktu_selesai',        I::TIME,     REQUIRED],
                [SHOW, I::SELECT,              'id_status',            I::INDEX,  REQUIRED],
            ],
        );
    }
}