<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JenisPencekalan;

use App\Core\ModelTemplate;

final class JenisPencekalanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'penanganan_donor',
            'jenis_pencekalan',
            'id_jenis_pencekalan',
            [
                'id_jenis_pencekalan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_jenis_pencekalan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}