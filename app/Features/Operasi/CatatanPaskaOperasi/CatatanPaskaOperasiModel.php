<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanPaskaOperasi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class CatatanPaskaOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'catatan_paska_operasi',
            'id_catatan_paska',
            [
                'id_catatan_paska' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter_bedah' => V::TODO(),
                'waktu_penilaian' => V::TODO(),
                'instruksi_rawat' => V::TODO(),
                'instruksi_cairan' => V::TODO(),
                'instruksi_antibiotik' => V::TODO(),
                'instruksi_analgetik' => V::TODO(),
                'instruksi_medikamentosa' => V::TODO(),
                'instruksi_diet' => V::TODO(),
                'instruksi_penunjang' => V::TODO(),
                'instruksi_transfusi' => V::TODO(),
                'instruksi_lainnya' => V::TODO(),
            ],
        );
    }
}