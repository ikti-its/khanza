<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefItemPemeriksaanLab;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_item_lab' => V::TODO(),
                'id_kategori' => V::TODO(),
                'kode_periksa' => V::TODO(),
                'nama_item' => V::TODO(),
                'tarif' => V::TODO(),
            ],
        );
    }
}