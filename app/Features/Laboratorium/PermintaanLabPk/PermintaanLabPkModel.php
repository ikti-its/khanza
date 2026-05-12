<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPk;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanLabPkModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PermintaanLabPkDatabase(),
            'BASE',
            'laboratorium',
            'permintaan_lab_pk',
            'id_permintaan_pk',
            [
                'id_permintaan_pk'          => V::DEFAULT(),
                'id_permintaan_lab'         => V::DEFAULT(),
                'id_item_pemeriksaan'       => V::DEFAULT(),
                'id_parameter_pemeriksaan'  => V::DEFAULT(),
            ],
            [
                'id_permintaan_lab'        => [],
                'id_item_pemeriksaan'      => ['kode_periksa', 'nama_item', 'tarif'],
                'id_parameter_pemeriksaan' => ['nama_parameter', 'satuan', 'nilai_rujukan', 'keterangan', 'biaya_item'],
            ]
        );
    }
}