<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriase;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class DataTriaseModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'data_triase',
            'id_triase',
            [
                'id_triase' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'tanggal_kunjungan' => V::TODO(),
                'id_cara_masuk' => V::TODO(),
                'id_alat_transportasi' => V::TODO(),
                'id_alasan_kedatangan' => V::TODO(),
                'keterangan_kedatangan' => V::TODO(),
                'id_macam_kasus' => V::TODO(),
                'sistolik' => V::TODO(),
                'diastolik' => V::TODO(),
                'nadi' => V::TODO(),
                'pernapasan' => V::TODO(),
                'suhu' => V::TODO(),
                'saturasi_o2' => V::TODO(),
                'nyeri' => V::TODO()
            ],
        );
    }
}