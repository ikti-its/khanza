<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksiAirway;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengkajianPreInduksiAirwayModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'pengkajian_pre_induksi_airway',
            'id_airway',
            [
                'id_airway' => V::TODO(),
                'id_pengkajian' => V::TODO(),
                'jenis_airway' => V::TODO(),
                'nomor' => V::TODO(),
                'jenis' => V::TODO(),
                'fiksasi_cm' => V::TODO(),
                'keterangan' => V::TODO(),
            ],
        );
    }
}