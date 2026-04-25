<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Pulau;

use App\Core\ModelTemplate;

final class PulauModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'lokasi',
            'pulau',
            'id_pulau',
            [
                'id_pulau' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_pulau' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}