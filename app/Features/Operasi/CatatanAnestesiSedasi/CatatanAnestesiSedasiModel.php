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
            'BASE',
            'operasi',
            'catatan_anestesi_sedasi',
            'id_catatan_anestesi',
            [
                'id_catatan_anestesi' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_catatan' => V::TODO(),
                'diagnosa_pra_bedah' => V::TODO(),
                'tindakan' => V::TODO(),
                'diagnosa_paska_bedah' => V::TODO(),
                'kode_dpjp_anestesi' => V::TODO(),
                'kode_dpjp_bedah' => V::TODO(),
                'id_perawat_anestesi' => V::TODO(),
                'id_perawat_bedah' => V::TODO(),
                'jam_pengkajian' => V::TODO(),
                'id_kesadaran' => V::TODO(),
                'sistolik' => V::TODO(),
                'diastolik' => V::TODO(),
                'nadi' => V::TODO(),
                'respiratory_rate' => V::TODO(),
                'suhu' => V::TODO(),
                'saturasi_o2' => V::TODO(),
                'tinggi_badan_cm' => V::TODO(),
                'berat_badan_kg' => V::TODO(),
                'id_golongan_darah' => V::TODO(),
                'id_rhesus' => V::TODO(),
                'hemoglobin' => V::TODO(),
                'hematokrit' => V::TODO(),
                'leukosit' => V::TODO(),
                'trombosit' => V::TODO(),
                'bleeding_time_bt' => V::TODO(),
                'clotting_time_ct' => V::TODO(),
                'gula_darah_sewaktu' => V::TODO(),
                'klinis_lain_lain' => V::TODO(),
                'id_asa' => V::TODO(),
                'is_alergi' => V::TODO(),
                'ket_alergi' => V::TODO(),
                'penyulit_pra' => V::TODO(),
                'is_lanjut_tindakan' => V::TODO(),
                'id_jenis_sedasi' => V::TODO(),
                'ket_sedasi' => V::TODO(),
                'is_epidural' => V::TODO(),
                'is_spinal' => V::TODO(),
                'is_anestesi_umum' => V::TODO(),
                'ket_anestesi_umum' => V::TODO(),
                'is_blok_perifer' => V::TODO(),
                'ket_blok_perifer' => V::TODO(),
                'is_batal_tindakan' => V::TODO(),
                'alasan_batal' => V::TODO(),
            ],
        );
    }
}