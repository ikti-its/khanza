<?php
declare(strict_types=1);

namespace App\Features\Operasi\PermintaanOperasi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PermintaanOperasiDatabase(),
            'BASE',
            'operasi',
            'permintaan_operasi',
            'id_permintaan',
            [
                'id_permintaan' => V::DEFAULT(),
                'nomor_reg'     => V::DEFAULT(),
                'kode_dokter'   => V::DEFAULT(),
                'tanggal_minta' => V::DEFAULT(),
                'is_cito'       => V::DEFAULT(),
            ],
            [
                'nomor_reg'   => ['nomor_rawat'],
                'kode_dokter' => [],
            ],
        );
    }
}
