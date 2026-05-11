<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRad;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilRadModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'radiologi',
            'hasil_rad',
            'id_hasil_rad',
            [
                'id_hasil_rad' => V::TODO(),
                'id_permintaan_rad' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter_pj' => V::TODO(),
                'id_petugas_rad' => V::TODO(),
                'kode_dokter_perujuk' => V::TODO(),
                'tgl_jam_hasil' => V::TODO(),
                'catatan' => V::TODO(),
            ],
        );
    }
}