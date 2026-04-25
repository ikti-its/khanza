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
                [HIDE, 'ID Jadwal',           'id_jadwal',            'indeks',  OPTIONAL],
                [SHOW, 'ID Permintaan',       'id_permintaan',        'indeks',  REQUIRED],
                [SHOW, 'ID Ruangan',          'id_ruangan',           'indeks',  REQUIRED],
                [SHOW, 'ID Tindakan',         'id_tindakan',          'indeks',  REQUIRED],
                [SHOW, 'Kode Dokter Bedah',   'kode_dokter_bedah',    'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi','kode_dokter_anestesi', 'teks',    REQUIRED],
                [SHOW, 'Tanggal',             'tanggal',              'tanggal', REQUIRED],
                [SHOW, 'Waktu Mulai',         'waktu_mulai',          'jam',     REQUIRED],
                [SHOW, 'Waktu Selesai',       'waktu_selesai',        'jam',     REQUIRED],
                [SHOW, 'Status',              'id_status',            'indeks',  REQUIRED],
            ],
        );
    }
}