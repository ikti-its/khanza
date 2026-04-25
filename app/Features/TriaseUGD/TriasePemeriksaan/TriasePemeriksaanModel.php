<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;

use App\Core\ModelTemplate;

final class TriasePemeriksaanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'triase_pemeriksaan',
            'id_pemeriksaan',
            [
                'id_pemeriksaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kode_pemeriksaan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_pemeriksaan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}