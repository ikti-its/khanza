<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;

use App\Core\ModelTemplate;

final class PengambilanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'donor',
            'pengambilan_darah',
            'id_pengambilan_darah',
            [
                'id_pengambilan_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nomor_pengambilan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_kunjungan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_pengambilan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_shift' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_jenis_donor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_lokasi_pengambilan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_petugas' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}