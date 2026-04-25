<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusKantong;

use App\Core\ModelTemplate;

final class StatusKantongModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_darah',
            'status_kantong',
            'id_status_kantong',
            [
                'id_status_kantong' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status_kantong' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}