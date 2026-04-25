<?php
declare(strict_types=1);

namespace App\Features\Donor\SkriningDonor;
use App\Core\Model\ModelTemplate;

final class SkriningDonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'donor',
            'skrining_donor',
            'id_skrining',
            [
                'id_skrining' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_kunjungan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'sistolik' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'diastolik' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'berat_badan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kadar_hemoglobin' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'suhu_tubuh' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_hasil_anamnesis' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}