<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabHeader;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanLabHeaderModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'permintaan_lab_header',
            'id_permintaan',
            [
                'id_permintaan' => V::TODO(),
                'no_permintaan' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'id_kategori_lab' => V::TODO(),
                'kode_dokter_perujuk' => V::TODO(),
                'tgl_permintaan' => V::TODO(),
                'indikasi_klinis' => V::TODO(),
                'informasi_tambahan' => V::TODO(),
                'id_status_permintaan' => V::TODO(),
            ],
        );
    }
}