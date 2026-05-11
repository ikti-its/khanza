<?php
declare(strict_types=1);

namespace App\Features\Radiologi\PermintaanRad;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanRadModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'radiologi',
            'permintaan_rad',
            'id_permintaan',
            [
                'id_permintaan' => V::TODO(),
                'no_permintaan' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter_perujuk' => V::TODO(),
                'tgl_jam_permintaan' => V::TODO(),
                'informasi_tambahan' => V::TODO(),
                'indikasi_klinis' => V::TODO(),
                'id_status_permintaan' => V::TODO(),
                'id_item_rad' => V::TODO(),
            ],
        );
    }
}