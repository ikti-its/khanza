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
            'BASE',
            'operasi',
            'checklist_postop',
            'id_checklist_post',
            [
                'id_checklist_post' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_checklist' => V::TODO(),
                'sn_cn' => V::TODO(),
                'kode_dokter_bedah' => V::TODO(),
                'kode_dokter_anestesi' => V::TODO(),
                'tindakan' => V::TODO(),
                'id_kesadaran_pascaop' => V::TODO(),
                'jenis_cairan_infus' => V::TODO(),
                'id_jaringan_pa_vc' => V::TODO(),
                'id_kateter_urine' => V::TODO(),
                'id_petugas_anestesi' => V::TODO(),
                'id_petugas_ok' => V::TODO(),
            ],
        );
    }
}