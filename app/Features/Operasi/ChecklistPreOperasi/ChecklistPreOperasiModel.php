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
            'BASE',
            'operasi',
            'checklist_pre_operasi',
            'id_checklist',
            [
                'id_checklist' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_checklist' => V::TODO(),
                'sn_cn' => V::TODO(),
                'kode_dokter_bedah' => V::TODO(),
                'kode_dokter_anestesi' => V::TODO(),
                'tindakan' => V::TODO(),
                'is_identitas_sesuai' => V::TODO(),
                'id_keadaan_umum' => V::TODO(),
                'id_penandaan_area' => V::TODO(),
                'is_ijin_bedah' => V::TODO(),
                'is_ijin_anestesi' => V::TODO(),
                'id_ijin_transfusi' => V::TODO(),
                'id_persiapan_darah' => V::TODO(),
                'ket_persiapan_darah' => V::TODO(),
                'id_perlengkapan_khusus' => V::TODO(),
                'id_petugas_ruangan' => V::TODO(),
                'id_petugas_ok' => V::TODO(),
            ],
        );
    }
}