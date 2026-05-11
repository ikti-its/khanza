<?php
declare(strict_types=1);

namespace App\Features\Operasi\SigninSebelumAnestesi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SigninSebelumAnestesiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'signin_sebelum_anestesi',
            'id_signin',
            [
                'id_signin' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_signin' => V::TODO(),
                'sn_cn' => V::TODO(),
                'kode_dokter_bedah' => V::TODO(),
                'kode_dokter_anestesi' => V::TODO(),
                'tindakan' => V::TODO(),
                'is_identitas_sesuai' => V::TODO(),
                'alergi' => V::TODO(),
                'id_penandaan_area' => V::TODO(),
                'is_resiko_aspirasi' => V::TODO(),
                'rencana_aspirasi' => V::TODO(),
                'is_resiko_hilang_darah' => V::TODO(),
                'jalur_iv_line' => V::TODO(),
                'rencana_hilang_darah' => V::TODO(),
                'id_kesiapan_anestesi' => V::TODO(),
                'rencana_kesiapan_anestesi' => V::TODO(),
                'id_perawat_ok' => V::TODO(),
            ],
        );
    }
}