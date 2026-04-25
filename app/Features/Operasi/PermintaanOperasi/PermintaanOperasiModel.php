<?php
declare(strict_types=1);

namespace App\Features\Operasi\PermintaanOperasi;

use App\Core\ModelTemplate;

final class PermintaanOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'permintaan_operasi',
            'id_permintaan',
            [
                'id_permintaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tanggal_minta' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_cito' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}