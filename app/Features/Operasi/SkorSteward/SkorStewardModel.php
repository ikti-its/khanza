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
            'BASE',
            'operasi',
            'skor_steward',
            'id_skor_steward',
            [
                'id_skor_steward' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_penilaian' => V::TODO(),
                'id_petugas' => V::TODO(),
                'id_dokter_anestesi' => V::TODO(),
                'skor_kesadaran' => V::TODO(),
                'skor_respirasi' => V::TODO(),
                'skor_motorik' => V::TODO(),
                'total_skor' => V::TODO(),
                'is_boleh_pindah' => V::TODO(),
                'catatan_keluar' => V::TODO(),
                'instruksi_rr' => V::TODO(),
            ],
        );
    }
}