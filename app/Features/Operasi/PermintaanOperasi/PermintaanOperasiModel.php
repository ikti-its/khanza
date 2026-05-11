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
            'BASE',
            'operasi',
            'permintaan_operasi',
            'id_permintaan',
            [
                'id_permintaan' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter' => V::TODO(),
                'tanggal_minta' => V::TODO(),
                'is_cito' => V::TODO(),
            ],
        );
    }
}