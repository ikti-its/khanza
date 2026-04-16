<?php
declare(strict_types=1);

namespace App\Features\Operasi\JadwalOperasi;
use App\Core\Controller\ControllerTemplate;

class JadwalOperasiController extends ControllerTemplate
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
                [0, 'ID Jadwal',           'id_jadwal',            'indeks',  0],
                [1, 'ID Permintaan',       'id_permintaan',        'indeks',  1],
                [1, 'ID Ruangan',          'id_ruangan',           'indeks',  1],
                [1, 'ID Tindakan',         'id_tindakan',          'indeks',  1],
                [1, 'Kode Dokter Bedah',   'kode_dokter_bedah',    'teks',    1],
                [1, 'Kode Dokter Anestesi','kode_dokter_anestesi', 'teks',    1],
                [1, 'Tanggal',             'tanggal',              'tanggal', 1],
                [1, 'Waktu Mulai',         'waktu_mulai',          'jam',     1],
                [1, 'Waktu Selesai',       'waktu_selesai',        'jam',     1],
                [1, 'Status',              'id_status',            'indeks',  1],
            ],
        );
    }
}