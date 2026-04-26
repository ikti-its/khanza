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
                [HIDE, OPTIONAL, I::INDEX, 'id_signin', 'ID Sign In'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::DATE, 'waktu_signin', 'Waktu Sign In'],
                [SHOW, REQUIRED, I::TEXT, 'sn_cn', 'SN/CN'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_bedah', 'Kode Dokter Bedah'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_anestesi', 'Kode Dokter Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'tindakan', 'Tindakan'],
                [SHOW, REQUIRED, I::SELECT, 'is_identitas_sesuai', 'Identitas Sesuai'],
                [SHOW, REQUIRED, I::TEXT, 'alergi', 'Alergi'],
                [SHOW, REQUIRED, I::INDEX, 'id_penandaan_area', 'Penandaan Area'],
                [SHOW, REQUIRED, I::SELECT, 'is_resiko_aspirasi', 'Risiko Aspirasi'],
                [SHOW, REQUIRED, I::TEXT, 'rencana_aspirasi', 'Rencana Aspirasi'],
                [SHOW, REQUIRED, I::SELECT, 'is_resiko_hilang_darah', 'Risiko Hilang Darah'],
                [SHOW, REQUIRED, I::TEXT, 'jalur_iv_line', 'Jalur IV Line'],
                [SHOW, REQUIRED, I::TEXT, 'rencana_hilang_darah', 'Rencana Hilang Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_kesiapan_anestesi', 'Kesiapan Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'rencana_kesiapan_anestesi', 'Rencana Kesiapan Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'id_perawat_ok', 'ID Perawat OK'],
            ],
        );
    }
}