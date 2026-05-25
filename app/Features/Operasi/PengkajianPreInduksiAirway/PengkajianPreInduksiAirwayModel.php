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
            new PengkajianPreInduksiAirwayDatabase(),
            'BASE',
            'operasi',
            'pengkajian_pre_induksi_airway',
            'id_airway',
            [
                'id_airway'       => V::DEFAULT(),
                'id_pengkajian'   => V::DEFAULT(),
                'id_jenis_airway' => V::DEFAULT(),
                'nomor'           => V::DEFAULT(),
                'jenis'           => V::DEFAULT(),
                'fiksasi_cm'      => V::DEFAULT(),
                'keterangan'      => V::DEFAULT(),
            ],
            [
                'id_pengkajian'   => [],
                'id_jenis_airway' => ['nama_jenis'],
            ],
        );
    }
}
