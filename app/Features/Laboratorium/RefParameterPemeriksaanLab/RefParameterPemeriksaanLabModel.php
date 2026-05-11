<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefParameterPemeriksaanLab;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_parameter' => V::TODO(),
                'id_item_lab' => V::TODO(),
                'nama_parameter' => V::TODO(),
                'satuan' => V::TODO(),
                'nilai_rujukan' => V::TODO(),
                'keterangan' => V::TODO(),
                'biaya_item' => V::TODO(),
            ],
        );
    }
}