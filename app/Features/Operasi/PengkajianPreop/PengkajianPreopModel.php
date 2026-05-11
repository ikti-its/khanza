<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreop;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengkajianPreopModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'pengkajian_preop',
            'id_pengkajian_pre',
            [
                'id_pengkajian_pre' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter_bedah' => V::TODO(),
                'waktu_pengkajian' => V::TODO(),
                'ringkasan_klinik' => V::TODO(),
                'pemeriksaan_fisik' => V::TODO(),
                'pemeriksaan_diagnostik' => V::TODO(),
                'diagnosa_pre_operasi' => V::TODO(),
                'rencana_tindakan' => V::TODO(),
                'persiapan_khusus' => V::TODO(),
                'terapi_pre_operasi' => V::TODO(),
            ],
        );
    }
}