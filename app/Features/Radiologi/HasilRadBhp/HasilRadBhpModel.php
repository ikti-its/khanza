<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadBhp;

use App\Core\ModelTemplate;

class HasilRadBhpModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'radiologi',
            'hasil_rad_bhp',
            'id_rad_bhp',
            [
                'id_rad_bhp' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_hasil_rad' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_barang_medis' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'jumlah_pakai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'satuan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'harga_satuan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}