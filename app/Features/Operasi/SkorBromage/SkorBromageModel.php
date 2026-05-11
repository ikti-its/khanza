<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorBromage;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SkorBromageModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'skor_bromage',
            'id_skor_bromage',
            [
                'id_skor_bromage' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_penilaian' => V::TODO(),
                'id_petugas' => V::TODO(),
                'id_dokter_anestesi' => V::TODO(),
                'skor_bromage' => V::TODO(),
                'is_boleh_pindah' => V::TODO(),
                'catatan_keluar' => V::TODO(),
                'instruksi_rr' => V::TODO(),
            ],
        );
    }
}