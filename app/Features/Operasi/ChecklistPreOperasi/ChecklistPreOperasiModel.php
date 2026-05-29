<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ChecklistPreOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new ChecklistPreOperasiDatabase(),
            [
                'id_checklist'           => V::DEFAULT(),
                'nomor_reg'              => V::DEFAULT(),
                'waktu_checklist'        => V::DEFAULT(),
                'sn_cn'                  => V::DEFAULT(),
                'kode_dokter_bedah'      => V::DEFAULT(),
                'kode_dokter_anestesi'   => V::DEFAULT(),
                'tindakan'               => V::DEFAULT(),
                'is_identitas_sesuai'    => V::DEFAULT(),
                'id_keadaan_umum'        => V::DEFAULT(),
                'id_penandaan_area'      => V::DEFAULT(),
                'is_ijin_bedah'          => V::DEFAULT(),
                'is_ijin_anestesi'       => V::DEFAULT(),
                'id_ijin_transfusi'      => V::DEFAULT(),
                'id_persiapan_darah'     => V::DEFAULT(),
                'ket_persiapan_darah'    => V::DEFAULT(),
                'id_perlengkapan_khusus' => V::DEFAULT(),
                'id_petugas_ruangan'     => V::DEFAULT(),
                'id_petugas_ok'          => V::DEFAULT(),
            ],
            [
                'nomor_reg'              => ['nomor_rawat'],
                'kode_dokter_bedah'      => [],
                'kode_dokter_anestesi'   => [],
                'id_keadaan_umum'        => ['nama_keadaan'],
                'id_penandaan_area'      => ['nama_ketersediaan'],
                'id_ijin_transfusi'      => ['nama_ketersediaan'],
                'id_persiapan_darah'     => ['nama_ketersediaan'],
                'id_perlengkapan_khusus' => ['nama_ketersediaan'],
                'id_petugas_ruangan'     => [],
                'id_petugas_ok'          => [],
            ],
        );
    }
}
