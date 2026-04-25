<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusStok;

use App\Core\ModelTemplate;

final class StatusStokModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_darah',
            'status_stok',
            'id_status_stok',
            [
                'id_status_stok' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status_stok' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}