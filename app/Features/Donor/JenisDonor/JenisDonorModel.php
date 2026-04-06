<?php
declare(strict_types=1);

namespace App\Features\Donor\JenisDonor;

use App\Core\ModelTemplate;

class JenisDonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'donor',
            'jenis_donor',
            'id_jenis_donor',
            [
                'id_jenis_donor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kode_jenis_donor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_jenis_donor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}