<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostop;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class ChecklistPostopModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new ChecklistPostopDatabase(),
            'BASE',
            'operasi',
            'checklist_postop',
            'id_checklist_post',
            [
                'id_checklist_post'    => V::DEFAULT(),
                'nomor_reg'            => V::DEFAULT(),
                'waktu_checklist'      => V::DEFAULT(),
                'sn_cn'                => V::DEFAULT(),
                'kode_dokter_bedah'    => V::DEFAULT(),
                'kode_dokter_anestesi' => V::DEFAULT(),
                'tindakan'             => V::DEFAULT(),
                'id_kesadaran_pascaop' => V::DEFAULT(),
                'jenis_cairan_infus'   => V::DEFAULT(),
                'id_jaringan_pa_vc'    => V::DEFAULT(),
                'id_kateter_urine'     => V::DEFAULT(),
                'waktu_pasang_kateter' => V::DEFAULT(),
                'id_warna_urine'       => V::DEFAULT(),
                'jumlah_urine_cc'      => V::DEFAULT(),
                'catatan_luka_operasi' => V::DEFAULT(),
                'id_petugas_anestesi'  => V::DEFAULT(),
                'id_petugas_ok'        => V::DEFAULT(),
            ],
            [
                'nomor_reg'            => ['nomor_rawat'],
                'kode_dokter_bedah'    => [],
                'kode_dokter_anestesi' => [],
                'id_kesadaran_pascaop' => ['nama_kesadaran'],
                'id_jaringan_pa_vc'    => ['nama_ketersediaan'],
                'id_kateter_urine'     => ['nama_ketersediaan'],
                'id_warna_urine'       => ['nama_warna'],
                'id_petugas_anestesi'  => [],
                'id_petugas_ok'        => [],
            ]
        );
    }
}