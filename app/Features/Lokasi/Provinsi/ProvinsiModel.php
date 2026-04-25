<?php
declare(strict_types=1);

namespace App\Features\Lokasi\Provinsi;

use App\Core\ModelTemplate;

final class ProvinsiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'lokasi',
            'provinsi',
            'id_provinsi',
            [
                'id_pulau' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_provinsi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_provinsi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}