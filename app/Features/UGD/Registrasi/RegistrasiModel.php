<?php
declare(strict_types=1);

namespace App\Features\UGD\Registrasi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RegistrasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RegistrasiDatabase(),
            [
                'nomor_reg'        => V::DEFAULT(),
                'nomor_rawat'      => V::DEFAULT(),
                'tanggal'          => V::DEFAULT(),
                'jam'              => V::DEFAULT(),
                'kode_dokter'      => V::DEFAULT(),
                'dokter_dituju'    => V::DEFAULT(),
                'nomor_rm'         => V::DEFAULT(),
                'nama_pasien'      => V::DEFAULT(),
                'jenis_kelamin'    => V::DEFAULT(),
                'poliklinik'       => V::DEFAULT(),
                'penanggung_jawab' => V::DEFAULT(),
                'alamat_pj'        => V::DEFAULT(),
                'hubungan_pj'      => V::DEFAULT(),
                'biaya_registrasi' => V::DEFAULT(),
                'jenis_bayar'      => V::DEFAULT(),
                'status_rawat'     => V::DEFAULT(),
                'status_bayar'     => V::DEFAULT(),
            ],
            [],
        );
    }
}
