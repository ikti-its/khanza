<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefItemRad;

use App\Core\ModelTemplate;

class RefItemRadModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'radiologi',
            'ref_item_rad',
            'id_item',
            [
                'id_item' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_periksa' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_pemeriksaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tarif_dasar' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}