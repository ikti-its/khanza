<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPa;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanLabPaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'permintaan_lab_pa',
            'id_permintaan_pa',
            [
                'id_permintaan_pa' => V::TODO(),
                'id_permintaan_lab' => V::TODO(),
                'tgl_pengambilan_bahan' => V::TODO(),
                'metode_diperoleh' => V::TODO(),
                'lokasi_jaringan' => V::TODO(),
                'bahan_pengawet' => V::TODO(),
                'riwayat_lokasi_lab' => V::TODO(),
                'riwayat_tgl_sebelumnya' => V::TODO(),
                'riwayat_no_pa_sebelumnya' => V::TODO(),
                'riwayat_diagnosa_sebelumnya' => V::TODO(),
                'id_item_pemeriksaan' => V::TODO(),
            ],
        );
    }
}