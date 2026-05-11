<?php
declare(strict_types=1);

namespace App\Features\Operasi\SkorAldrette;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SkorAldretteModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'skor_aldrette',
            'id_skor_aldrette',
            [
                'id_skor_aldrette' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_penilaian' => V::TODO(),
                'id_petugas' => V::TODO(),
                'id_dokter_anestesi' => V::TODO(),
                'skor_aktivitas' => V::TODO(),
                'skor_respirasi' => V::TODO(),
                'skor_tekanan_darah' => V::TODO(),
                'skor_kesadaran' => V::TODO(),
                'skor_warna_kulit' => V::TODO(),
                'total_skor' => V::TODO(),
                'is_boleh_pindah' => V::TODO(),
                'catatan_keluar' => V::TODO(),
                'instruksi_rr' => V::TODO(),
            ],
        );
    }
}