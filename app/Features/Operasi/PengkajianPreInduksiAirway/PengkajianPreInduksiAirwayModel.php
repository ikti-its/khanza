<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksiAirway;

use App\Core\ModelTemplate;

class PengkajianPreInduksiAirwayModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'pengkajian_pre_induksi_airway',
            'id_airway',
            [
                'id_airway' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_pengkajian' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'jenis_airway' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'jenis' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fiksasi_cm' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'keterangan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}