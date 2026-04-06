<?php
declare(strict_types=1);

namespace App\Features\Inventori\Lokasi;

use App\Core\ModelTemplate;

class LokasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori',
            'lokasi',
            'id_lokasi',
            [
                'id_lokasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'nama_lokasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}