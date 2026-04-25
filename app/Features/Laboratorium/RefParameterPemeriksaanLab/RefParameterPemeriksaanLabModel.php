<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefParameterPemeriksaanLab;

use App\Core\ModelTemplate;

final class RefParameterPemeriksaanLabModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'laboratorium',
            'ref_parameter_pemeriksaan_lab',
            'id_parameter',
            [
                'id_parameter' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_item_lab' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_parameter' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'satuan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nilai_rujukan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'keterangan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'biaya_item' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}