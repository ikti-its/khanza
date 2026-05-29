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
            new SkorBromageDatabase(),
            [
                'id_skor_bromage'    => V::DEFAULT(),
                'nomor_reg'          => V::DEFAULT(),
                'waktu_penilaian'    => V::DEFAULT(),
                'id_petugas'         => V::DEFAULT(),
                'id_dokter_anestesi' => V::DEFAULT(),
                'skor_bromage'       => V::DEFAULT(),
                'is_boleh_pindah'    => V::DEFAULT(),
                'catatan_keluar'     => V::DEFAULT(),
                'instruksi_rr'       => V::DEFAULT(),
            ],
            [
                'nomor_reg'          => ['nomor_rawat'],
                'id_petugas'         => [],
                'id_dokter_anestesi' => [],
                'skor_bromage'       => ['nama_skala', 'tingkat_blok', 'nilai', 'gambar'],
            ],
        );
    }
}
