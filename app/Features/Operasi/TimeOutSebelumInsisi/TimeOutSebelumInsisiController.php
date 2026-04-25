<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Time Out',               'id_timeout',               I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',           'nomor_reg',                I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Time Out',             'waktu_timeout',            I::DATE, REQUIRED],
                [SHOW, 'SN/CN',                      'sn_cn',                    I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',          'kode_dokter_bedah',        I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',       'kode_dokter_anestesi',     I::TEXT,    REQUIRED],
                [SHOW, 'Tindakan',                   'tindakan',                 I::TEXT,    REQUIRED],
                [SHOW, 'Identitas Sesuai',           'is_identitas_sesuai',      I::SELECT,  REQUIRED],
                [SHOW, 'Tindakan Sesuai',            'is_tindakan_sesuai',       I::SELECT,  REQUIRED],
                [SHOW, 'Area Insisi Sesuai',         'is_area_insisi_sesuai',    I::SELECT,  REQUIRED],
                [SHOW, 'Penandaan Area',             'id_penandaan_area',        I::INDEX,  REQUIRED],
                [SHOW, 'Perkiraan Waktu (jam)',       'perkiraan_waktu_jam',      I::NUMBER,  REQUIRED],
                [SHOW, 'Antibiotik',                 'is_antibiotik',            I::SELECT,  REQUIRED],
                [SHOW, 'Nama Antibiotik',            'nama_antibiotik',          I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Antibiotik',           'waktu_antibiotik',         I::TIME,     REQUIRED],
                [SHOW, 'Antisipasi Hilang Darah',    'antisipasi_hilang_darah',  I::TEXT,    REQUIRED],
                [SHOW, 'Hal Khusus',                 'id_hal_khusus',            I::INDEX,  REQUIRED],
                [SHOW, 'Keterangan Hal Khusus',      'keterangan_hal_khusus',    I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal Steril',             'tanggal_steril',           I::DATE, REQUIRED],
                [SHOW, 'Steril Dikonfirmasi',        'is_steril_dikonfirmasi',   I::SELECT,  REQUIRED],
                [SHOW, 'Verifikasi Pre Op',          'is_verifikasi_preop',      I::SELECT,  REQUIRED],
                [SHOW, 'ID Perawat OK',              'id_perawat_ok',            I::TEXT,    REQUIRED],
            ],
        );
    }
}