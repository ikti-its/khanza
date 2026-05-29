<?php
declare(strict_types=1);

namespace App\Features\RawatInap\Registrasi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RegistrasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RegistrasiDatabase(),
            [
                'id_rawat_inap'    => V::DEFAULT(),
                'nomor_rawat'      => V::DEFAULT(),
                'nomor_rm'         => V::DEFAULT(),
                'nama_pasien'      => V::DEFAULT(),
                'alamat_pasien'    => V::DEFAULT(),
                'penanggung_jawab' => V::DEFAULT(),
                'hubungan_pj'      => V::DEFAULT(),
                'jenis_bayar'      => V::DEFAULT(),
                'kamar'            => V::DEFAULT(),
                'tarif_kamar'      => V::DEFAULT(),
                'diagnosa_awal'    => V::DEFAULT(),
                'diagnosa_akhir'   => V::DEFAULT(),
                'tanggal_masuk'    => V::DEFAULT(),
                'tanggal_keluar'   => V::DEFAULT(),
                'jam_keluar'       => V::DEFAULT(),
                'total_biaya'      => V::DEFAULT(),
                'status_pulang'    => V::DEFAULT(),
                'lama_ranap'       => V::DEFAULT(),
                'dokter_pj'        => V::DEFAULT(),
                'status_bayar'     => V::DEFAULT(),
                'jam_masuk'        => V::DEFAULT(),
            ],
            [],
        );
    }
}
