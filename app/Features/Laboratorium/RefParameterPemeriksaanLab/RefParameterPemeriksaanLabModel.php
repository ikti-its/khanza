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
            new RefParameterPemeriksaanLabDatabase(),
            'REFS',
            'laboratorium',
            'ref_parameter_pemeriksaan_lab',
            'id_parameter',
            [
                'id_parameter'    => V::DEFAULT(),
                'id_item_lab'     => V::DEFAULT(),
                'nama_parameter'  => V::DEFAULT(),
                'satuan'          => V::DEFAULT(),
                'nilai_rujukan'   => V::DEFAULT(),
                'biaya_item'      => V::DEFAULT(),
            ],
            [
                'id_item_lab'   => ['kode_periksa', 'nama_item', 'tarif'],
            ]
        );
    }
}