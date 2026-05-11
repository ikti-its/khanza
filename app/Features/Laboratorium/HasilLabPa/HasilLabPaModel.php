<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabPa;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilLabPaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'hasil_lab_pa',
            'id_hasil_pa',
            [
                'id_hasil_pa' => V::TODO(),
                'id_permintaan_lab' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter_pj' => V::TODO(),
                'id_petugas_lab' => V::TODO(),
                'kode_dokter_perujuk' => V::TODO(),
                'tgl_jam_hasil' => V::TODO(),
                'id_item_pemeriksaan' => V::TODO(),
                'diagnosa_klinis' => V::TODO(),
                'makroskopik' => V::TODO(),
                'mikroskopik' => V::TODO(),
                'kesimpulan' => V::TODO(),
                'kesan' => V::TODO(),
            ],
        );
    }
}