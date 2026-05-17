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
            new CatatanPaskaOperasiDatabase(),
            'BASE',
            'operasi',
            'catatan_paska_operasi',
            'id_catatan_paska',
            [
                'id_catatan_paska'        => V::DEFAULT(),
                'nomor_reg'               => V::DEFAULT(),
                'kode_dokter_bedah'       => V::DEFAULT(),
                'waktu_penilaian'         => V::DEFAULT(),
                'instruksi_rawat'         => V::DEFAULT(),
                'instruksi_cairan'        => V::DEFAULT(),
                'instruksi_antibiotik'    => V::DEFAULT(),
                'instruksi_analgetik'     => V::DEFAULT(),
                'instruksi_medikamentosa' => V::DEFAULT(),
                'instruksi_diet'          => V::DEFAULT(),
                'instruksi_penunjang'     => V::DEFAULT(),
                'instruksi_transfusi'     => V::DEFAULT(),
                'instruksi_lainnya'       => V::DEFAULT(),
            ],
            [
                'nomor_reg'         => ['nomor_rawat'],
                'kode_dokter_bedah' => [],
            ]
        );
    }
}