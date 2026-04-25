<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisi;
use App\Core\Controller\ControllerTemplate;

final class TimeOutSebelumInsisiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new TimeOutSebelumInsisiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Time Out Sebelum Insisi', 'icon' => 'time_out_sebelum_insisi'],
            ],
            judul: 'Time Out Sebelum Insisi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Time Out',               'id_timeout',               'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',           'nomor_reg',                'teks',    REQUIRED],
                [SHOW, 'Waktu Time Out',             'waktu_timeout',            'tanggal', REQUIRED],
                [SHOW, 'SN/CN',                      'sn_cn',                    'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',          'kode_dokter_bedah',        'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',       'kode_dokter_anestesi',     'teks',    REQUIRED],
                [SHOW, 'Tindakan',                   'tindakan',                 'teks',    REQUIRED],
                [SHOW, 'Identitas Sesuai',           'is_identitas_sesuai',      'status',  REQUIRED],
                [SHOW, 'Tindakan Sesuai',            'is_tindakan_sesuai',       'status',  REQUIRED],
                [SHOW, 'Area Insisi Sesuai',         'is_area_insisi_sesuai',    'status',  REQUIRED],
                [SHOW, 'Penandaan Area',             'id_penandaan_area',        'indeks',  REQUIRED],
                [SHOW, 'Perkiraan Waktu (jam)',       'perkiraan_waktu_jam',      'jumlah',  REQUIRED],
                [SHOW, 'Antibiotik',                 'is_antibiotik',            'status',  REQUIRED],
                [SHOW, 'Nama Antibiotik',            'nama_antibiotik',          'teks',    REQUIRED],
                [SHOW, 'Waktu Antibiotik',           'waktu_antibiotik',         'jam',     REQUIRED],
                [SHOW, 'Antisipasi Hilang Darah',    'antisipasi_hilang_darah',  'teks',    REQUIRED],
                [SHOW, 'Hal Khusus',                 'id_hal_khusus',            'indeks',  REQUIRED],
                [SHOW, 'Keterangan Hal Khusus',      'keterangan_hal_khusus',    'teks',    REQUIRED],
                [SHOW, 'Tanggal Steril',             'tanggal_steril',           'tanggal', REQUIRED],
                [SHOW, 'Steril Dikonfirmasi',        'is_steril_dikonfirmasi',   'status',  REQUIRED],
                [SHOW, 'Verifikasi Pre Op',          'is_verifikasi_preop',      'status',  REQUIRED],
                [SHOW, 'ID Perawat OK',              'id_perawat_ok',            'teks',    REQUIRED],
            ],
        );
    }
}