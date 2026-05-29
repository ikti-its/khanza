<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class CatatanAnestesiSedasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new CatatanAnestesiSedasiDatabase(),
            [
                'id_catatan_anestesi'  => V::DEFAULT(),
                'nomor_reg'            => V::DEFAULT(),
                'waktu_catatan'        => V::DEFAULT(),
                'diagnosa_pra_bedah'   => V::DEFAULT(),
                'tindakan'             => V::DEFAULT(),
                'diagnosa_paska_bedah' => V::DEFAULT(),
                'kode_dpjp_anestesi'   => V::DEFAULT(),
                'kode_dpjp_bedah'      => V::DEFAULT(),
                'id_perawat_anestesi'  => V::DEFAULT(),
                'id_perawat_bedah'     => V::DEFAULT(),
                'jam_pengkajian'       => V::DEFAULT(),
                'id_kesadaran'         => V::DEFAULT(),
                'sistolik'             => V::DEFAULT(),
                'diastolik'            => V::DEFAULT(),
                'nadi'                 => V::DEFAULT(),
                'respiratory_rate'     => V::DEFAULT(),
                'suhu'                 => V::DEFAULT(),
                'saturasi_o2'          => V::DEFAULT(),
                'tinggi_badan_cm'      => V::DEFAULT(),
                'berat_badan_kg'       => V::DEFAULT(),
                'id_golongan_darah'    => V::DEFAULT(),
                'id_rhesus'            => V::DEFAULT(),
                'hemoglobin'           => V::DEFAULT(),
                'hematokrit'           => V::DEFAULT(),
                'leukosit'             => V::DEFAULT(),
                'trombosit'            => V::DEFAULT(),
                'bleeding_time_bt'     => V::DEFAULT(),
                'clotting_time_ct'     => V::DEFAULT(),
                'gula_darah_sewaktu'   => V::DEFAULT(),
                'klinis_lain_lain'     => V::DEFAULT(),
                'id_asa'               => V::DEFAULT(),
                'is_alergi'            => V::DEFAULT(),
                'ket_alergi'           => V::DEFAULT(),
                'penyulit_pra'         => V::DEFAULT(),
                'is_lanjut_tindakan'   => V::DEFAULT(),
                'id_jenis_sedasi'      => V::DEFAULT(),
                'ket_sedasi'           => V::DEFAULT(),
                'is_epidural'          => V::DEFAULT(),
                'is_spinal'            => V::DEFAULT(),
                'is_anestesi_umum'     => V::DEFAULT(),
                'ket_anestesi_umum'    => V::DEFAULT(),
                'is_blok_perifer'      => V::DEFAULT(),
                'ket_blok_perifer'     => V::DEFAULT(),
                'is_batal_tindakan'    => V::DEFAULT(),
                'alasan_batal'         => V::DEFAULT(),
            ],
            [
                'nomor_reg'           => ['nomor_rawat'],
                'kode_dpjp_anestesi'  => [],
                'kode_dpjp_bedah'     => [],
                'id_perawat_anestesi' => [],
                'id_perawat_bedah'    => [],
                'id_kesadaran'        => ['nama_kesadaran'],
                'id_golongan_darah'   => ['nama_golongan_darah'],
                'id_rhesus'           => ['kode_rhesus'],
                'id_asa'              => ['nama_asa'],
                'id_jenis_sedasi'     => ['nama_sedasi'],
            ],
        );
    }
}
