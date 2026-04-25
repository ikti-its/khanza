<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisi;

use App\Core\ModelTemplate;

final class TimeOutSebelumInsisiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'timeout_sebelum_insisi',
            'id_timeout',
            [
                'id_timeout' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_timeout' => [
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
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_identitas_sesuai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_tindakan_sesuai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_area_insisi_sesuai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_penandaan_area' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'perkiraan_waktu_jam' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_antibiotik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_antibiotik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_antibiotik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'antisipasi_hilang_darah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_hal_khusus' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'keterangan_hal_khusus' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tanggal_steril' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_steril_dikonfirmasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_verifikasi_preop' => [
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