<?php
declare(strict_types=1);

namespace App\Features\Operasi\SigninSebelumAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class SigninSebelumAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SigninSebelumAnestesiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Sign In Sebelum Anestesi', 'icon' => 'signin_sebelum_anestesi'],
            ],
            judul: 'Sign In Sebelum Anestesi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Sign In',               'id_signin',                 'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',          'nomor_reg',                 'teks',    REQUIRED],
                [SHOW, 'Waktu Sign In',             'waktu_signin',              'tanggal', REQUIRED],
                [SHOW, 'SN/CN',                     'sn_cn',                     'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',         'kode_dokter_bedah',         'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',      'kode_dokter_anestesi',      'teks',    REQUIRED],
                [SHOW, 'Tindakan',                  'tindakan',                  'teks',    REQUIRED],
                [SHOW, 'Identitas Sesuai',          'is_identitas_sesuai',       'status',  REQUIRED],
                [SHOW, 'Alergi',                    'alergi',                    'teks',    REQUIRED],
                [SHOW, 'Penandaan Area',            'id_penandaan_area',         'indeks',  REQUIRED],
                [SHOW, 'Risiko Aspirasi',           'is_resiko_aspirasi',        'status',  REQUIRED],
                [SHOW, 'Rencana Aspirasi',          'rencana_aspirasi',          'teks',    REQUIRED],
                [SHOW, 'Risiko Hilang Darah',       'is_resiko_hilang_darah',    'status',  REQUIRED],
                [SHOW, 'Jalur IV Line',             'jalur_iv_line',             'teks',    REQUIRED],
                [SHOW, 'Rencana Hilang Darah',      'rencana_hilang_darah',      'teks',    REQUIRED],
                [SHOW, 'Kesiapan Anestesi',         'id_kesiapan_anestesi',      'indeks',  REQUIRED],
                [SHOW, 'Rencana Kesiapan Anestesi', 'rencana_kesiapan_anestesi', 'teks',    REQUIRED],
                [SHOW, 'ID Perawat OK',             'id_perawat_ok',             'teks',    REQUIRED],
            ],
        );
    }
}