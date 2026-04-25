<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Lokasi;

use App\Core\ModelTemplate;

final class LokasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_non_medis',
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