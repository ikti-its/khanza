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
                [0, 'ID Time Out',               'id_timeout',               'indeks',  0],
                [1, 'Nomor Registrasi',           'nomor_reg',                'teks',    1],
                [1, 'Waktu Time Out',             'waktu_timeout',            'tanggal', 1],
                [1, 'SN/CN',                      'sn_cn',                    'teks',    1],
                [1, 'Kode Dokter Bedah',          'kode_dokter_bedah',        'teks',    1],
                [1, 'Kode Dokter Anestesi',       'kode_dokter_anestesi',     'teks',    1],
                [1, 'Tindakan',                   'tindakan',                 'teks',    1],
                [1, 'Identitas Sesuai',           'is_identitas_sesuai',      'status',  1],
                [1, 'Tindakan Sesuai',            'is_tindakan_sesuai',       'status',  1],
                [1, 'Area Insisi Sesuai',         'is_area_insisi_sesuai',    'status',  1],
                [1, 'Penandaan Area',             'id_penandaan_area',        'indeks',  1],
                [1, 'Perkiraan Waktu (jam)',       'perkiraan_waktu_jam',      'jumlah',  1],
                [1, 'Antibiotik',                 'is_antibiotik',            'status',  1],
                [1, 'Nama Antibiotik',            'nama_antibiotik',          'teks',    1],
                [1, 'Waktu Antibiotik',           'waktu_antibiotik',         'jam',     1],
                [1, 'Antisipasi Hilang Darah',    'antisipasi_hilang_darah',  'teks',    1],
                [1, 'Hal Khusus',                 'id_hal_khusus',            'indeks',  1],
                [1, 'Keterangan Hal Khusus',      'keterangan_hal_khusus',    'teks',    1],
                [1, 'Tanggal Steril',             'tanggal_steril',           'tanggal', 1],
                [1, 'Steril Dikonfirmasi',        'is_steril_dikonfirmasi',   'status',  1],
                [1, 'Verifikasi Pre Op',          'is_verifikasi_preop',      'status',  1],
                [1, 'ID Perawat OK',              'id_perawat_ok',            'teks',    1],
            ],
        );
    }
}