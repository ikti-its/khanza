<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorBromage;

use App\Core\ModelTemplate;

class SkorBromageModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'skor_bromage',
            'id_skor_bromage',
            [
                'id_skor_bromage' => [
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
                'skor_bromage' => [
                    'allowed' => true,
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