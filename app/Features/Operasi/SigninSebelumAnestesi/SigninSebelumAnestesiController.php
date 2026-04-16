<?php
declare(strict_types=1);

namespace App\Features\Operasi\SigninSebelumAnestesi;
use App\Core\Controller\ControllerTemplate;

class SigninSebelumAnestesiController extends ControllerTemplate
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
                [0, 'ID Sign In',               'id_signin',                 'indeks',  0],
                [1, 'Nomor Registrasi',          'nomor_reg',                 'teks',    1],
                [1, 'Waktu Sign In',             'waktu_signin',              'tanggal', 1],
                [1, 'SN/CN',                     'sn_cn',                     'teks',    1],
                [1, 'Kode Dokter Bedah',         'kode_dokter_bedah',         'teks',    1],
                [1, 'Kode Dokter Anestesi',      'kode_dokter_anestesi',      'teks',    1],
                [1, 'Tindakan',                  'tindakan',                  'teks',    1],
                [1, 'Identitas Sesuai',          'is_identitas_sesuai',       'status',  1],
                [1, 'Alergi',                    'alergi',                    'teks',    1],
                [1, 'Penandaan Area',            'id_penandaan_area',         'indeks',  1],
                [1, 'Risiko Aspirasi',           'is_resiko_aspirasi',        'status',  1],
                [1, 'Rencana Aspirasi',          'rencana_aspirasi',          'teks',    1],
                [1, 'Risiko Hilang Darah',       'is_resiko_hilang_darah',    'status',  1],
                [1, 'Jalur IV Line',             'jalur_iv_line',             'teks',    1],
                [1, 'Rencana Hilang Darah',      'rencana_hilang_darah',      'teks',    1],
                [1, 'Kesiapan Anestesi',         'id_kesiapan_anestesi',      'indeks',  1],
                [1, 'Rencana Kesiapan Anestesi', 'rencana_kesiapan_anestesi', 'teks',    1],
                [1, 'ID Perawat OK',             'id_perawat_ok',             'teks',    1],
            ],
        );
    }
}