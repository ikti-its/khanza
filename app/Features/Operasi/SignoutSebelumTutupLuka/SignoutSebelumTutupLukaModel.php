<?php
declare(strict_types=1);

namespace App\Features\Operasi\SignoutSebelumTutupLuka;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SignoutSebelumTutupLukaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'signout_sebelum_tutup_luka',
            'id_signout',
            [
                'id_signout' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_signout' => V::TODO(),
                'sn_cn' => V::TODO(),
                'kode_dokter_bedah' => V::TODO(),
                'kode_dokter_anestesi' => V::TODO(),
                'tindakan' => V::TODO(),
                'is_nama_tindakan_sesuai' => V::TODO(),
                'is_kasa_lengkap' => V::TODO(),
                'is_instrumen_lengkap' => V::TODO(),
                'is_alat_tajam_lengkap' => V::TODO(),
                'id_label_spesimen' => V::TODO(),
                'id_formulir_spesimen' => V::TODO(),
                'is_konfirmasi_bedah' => V::TODO(),
                'is_konfirmasi_anestesi' => V::TODO(),
                'is_konfirmasi_perawat' => V::TODO(),
                'catatan_pemulihan' => V::TODO(),
                'id_perawat_ok' => V::TODO(),
            ],
        );
    }
}