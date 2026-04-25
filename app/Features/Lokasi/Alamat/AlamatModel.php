<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Alamat;
use App\Core\Model\ModelTemplate;

final class AlamatModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'lokasi',
            'alamat',
            'id_alamat',
            [
                'id_alamat' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_desa_lokal' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'rw' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'rt' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'alamat_lengkap' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}