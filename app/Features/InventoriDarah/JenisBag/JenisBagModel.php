<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\JenisBag;

use App\Core\ModelTemplate;

class JenisBagModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_darah',
            'jenis_bag',
            'id_jenis_bag',
            [
                'id_jenis_bag' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kode_jenis_bag' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_jenis_bag' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}