<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TimeOutSebelumInsisiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'timeout_sebelum_insisi',
            'id_timeout',
            [
                'id_timeout' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_timeout' => V::TODO(),
                'sn_cn' => V::TODO(),
                'kode_dokter_bedah' => V::TODO(),
                'kode_dokter_anestesi' => V::TODO(),
                'tindakan' => V::TODO(),
                'is_identitas_sesuai' => V::TODO(),
                'is_tindakan_sesuai' => V::TODO(),
                'is_area_insisi_sesuai' => V::TODO(),
                'id_penandaan_area' => V::TODO(),
                'perkiraan_waktu_jam' => V::TODO(),
                'is_antibiotik' => V::TODO(),
                'nama_antibiotik' => V::TODO(),
                'waktu_antibiotik' => V::TODO(),
                'antisipasi_hilang_darah' => V::TODO(),
                'id_hal_khusus' => V::TODO(),
                'keterangan_hal_khusus' => V::TODO(),
                'tanggal_steril' => V::TODO(),
                'is_steril_dikonfirmasi' => V::TODO(),
                'is_verifikasi_preop' => V::TODO(),
                'id_perawat_ok' => V::TODO(),
            ],
        );
    }
}