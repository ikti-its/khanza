<?php
declare(strict_types=1);

namespace App\Features\Operasi\SigninSebelumAnestesi;

use App\Core\ModelTemplate;

class SigninSebelumAnestesiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'signin_sebelum_anestesi',
            'id_signin',
            [
                'id_signin' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_signin' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'sn_cn' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_bedah' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tindakan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_identitas_sesuai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'alergi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_penandaan_area' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_resiko_aspirasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rencana_aspirasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_resiko_hilang_darah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'jalur_iv_line' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rencana_hilang_darah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_kesiapan_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'rencana_kesiapan_anestesi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_perawat_ok' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}