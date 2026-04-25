<?php
declare(strict_types=1);

namespace App\Features\Operasi\SignoutSebelumTutupLuka;
use App\Core\Model\ModelTemplate;

final class SignoutSebelumTutupLukaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'signout_sebelum_tutup_luka',
            'id_signout',
            [
                'id_signout' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_signout' => [
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
                'is_nama_tindakan_sesuai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_kasa_lengkap' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_instrumen_lengkap' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_alat_tajam_lengkap' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_label_spesimen' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_formulir_spesimen' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_konfirmasi_bedah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_konfirmasi_anestesi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_konfirmasi_perawat' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'catatan_pemulihan' => [
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