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
            new TimeOutSebelumInsisiDatabase(),
            'BASE',
            'operasi',
            'timeout_sebelum_insisi',
            'id_timeout',
            [
                'id_timeout'              => V::DEFAULT(),
                'nomor_reg'               => V::DEFAULT(),
                'waktu_timeout'           => V::DEFAULT(),
                'sn_cn'                   => V::DEFAULT(),
                'kode_dokter_bedah'       => V::DEFAULT(),
                'kode_dokter_anestesi'    => V::DEFAULT(),
                'tindakan'                => V::DEFAULT(),
                'is_identitas_sesuai'     => V::DEFAULT(),
                'is_tindakan_sesuai'      => V::DEFAULT(),
                'is_area_insisi_sesuai'   => V::DEFAULT(),
                'id_penandaan_area'       => V::DEFAULT(),
                'perkiraan_waktu_jam'     => V::DEFAULT(),
                'is_antibiotik'           => V::DEFAULT(),
                'nama_antibiotik'         => V::DEFAULT(),
                'waktu_antibiotik'        => V::DEFAULT(),
                'antisipasi_hilang_darah' => V::DEFAULT(),
                'id_hal_khusus'           => V::DEFAULT(),
                'keterangan_hal_khusus'   => V::DEFAULT(),
                'tanggal_steril'          => V::DEFAULT(),
                'is_steril_dikonfirmasi'  => V::DEFAULT(),
                'is_verifikasi_preop'     => V::DEFAULT(),
                'id_perawat_ok'           => V::DEFAULT(),
            ],
            [
                'nomor_reg'            => ['nomor_rawat'],
                'kode_dokter_bedah'    => [],
                'kode_dokter_anestesi' => [],
                'id_penandaan_area'    => ['nama_ketersediaan'],
                'id_hal_khusus'        => ['nama_ketersediaan'],
                'id_perawat_ok'        => [],
            ],
        );
    }
}
