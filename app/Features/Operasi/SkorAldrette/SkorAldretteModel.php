<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorAldrette;

use App\Core\ModelTemplate;

class SkorAldretteModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'skor_aldrette',
            'id_skor_aldrette',
            [
                'id_skor_aldrette' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_penilaian' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_petugas' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_dokter_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'skor_aktivitas' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'skor_respirasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'skor_tekanan_darah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'skor_kesadaran' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'skor_warna_kulit' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'total_skor' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_boleh_pindah' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'catatan_keluar' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_rr' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}