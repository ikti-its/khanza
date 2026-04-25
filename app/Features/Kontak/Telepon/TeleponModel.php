<?php
declare(strict_types=1);

namespace App\Features\Kontak\Telepon;
use App\Core\Model\ModelTemplate;

final class TeleponModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'kontak',
            'telepon',
            'id_telepon',
            [
                'id_telepon' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_orang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nomor_telepon' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'jenis_telepon' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_provider' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}