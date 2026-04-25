<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefItemPemeriksaanLab;
use App\Core\Model\ModelTemplate;

final class RefItemPemeriksaanLabModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'laboratorium',
            'ref_item_pemeriksaan_lab',
            'id_item_lab',
            [
                'id_item_lab' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_kategori' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_periksa' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_item' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tarif' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}