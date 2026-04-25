<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPermintaan;
use App\Core\Model\ModelTemplate;

final class StatusPermintaanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'distribusi_darah',
            'status_permintaan',
            'id_status_permintaan',
            [
                'id_status_permintaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status_permintaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}