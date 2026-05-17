<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorSteward;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SkorStewardModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new SkorStewardDatabase(),
            'BASE',
            'operasi',
            'skor_steward',
            'id_skor_steward',
            [
                'id_skor_steward'       => V::DEFAULT(),
                'nomor_reg'             => V::DEFAULT(),
                'waktu_penilaian'       => V::DEFAULT(),
                'id_petugas'            => V::DEFAULT(),
                'id_dokter_anestesi'    => V::DEFAULT(),
                'skor_kesadaran'        => V::DEFAULT(),
                'skor_respirasi'        => V::DEFAULT(),
                'skor_motorik'          => V::DEFAULT(),
                // 'total_skor'            => V::DEFAULT(),
                'is_boleh_pindah'       => V::DEFAULT(),
                'catatan_keluar'        => V::DEFAULT(),
                'instruksi_rr'          => V::DEFAULT(),
            ],
            [
                'nomor_reg'          => ['nomor_rawat'],
                'id_petugas'         => [],
                'id_dokter_anestesi' => [],
                'skor_kesadaran'     => ['nama_skala', 'nilai'],
                'skor_respirasi'     => ['nama_skala', 'nilai'],
                'skor_motorik'       => ['nama_skala', 'nilai'], 
            ]
        );
    }
}