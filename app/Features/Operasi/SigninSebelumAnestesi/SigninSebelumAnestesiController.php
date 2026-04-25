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
                [HIDE, 'ID Sign In',               'id_signin',                 I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',          'nomor_reg',                 I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Sign In',             'waktu_signin',              I::DATE, REQUIRED],
                [SHOW, 'SN/CN',                     'sn_cn',                     I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',         'kode_dokter_bedah',         I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',      'kode_dokter_anestesi',      I::TEXT,    REQUIRED],
                [SHOW, 'Tindakan',                  'tindakan',                  I::TEXT,    REQUIRED],
                [SHOW, 'Identitas Sesuai',          'is_identitas_sesuai',       I::SELECT,  REQUIRED],
                [SHOW, 'Alergi',                    'alergi',                    I::TEXT,    REQUIRED],
                [SHOW, 'Penandaan Area',            'id_penandaan_area',         I::INDEX,  REQUIRED],
                [SHOW, 'Risiko Aspirasi',           'is_resiko_aspirasi',        I::SELECT,  REQUIRED],
                [SHOW, 'Rencana Aspirasi',          'rencana_aspirasi',          I::TEXT,    REQUIRED],
                [SHOW, 'Risiko Hilang Darah',       'is_resiko_hilang_darah',    I::SELECT,  REQUIRED],
                [SHOW, 'Jalur IV Line',             'jalur_iv_line',             I::TEXT,    REQUIRED],
                [SHOW, 'Rencana Hilang Darah',      'rencana_hilang_darah',      I::TEXT,    REQUIRED],
                [SHOW, 'Kesiapan Anestesi',         'id_kesiapan_anestesi',      I::INDEX,  REQUIRED],
                [SHOW, 'Rencana Kesiapan Anestesi', 'rencana_kesiapan_anestesi', I::TEXT,    REQUIRED],
                [SHOW, 'ID Perawat OK',             'id_perawat_ok',             I::TEXT,    REQUIRED],
            ],
        );
    }
}