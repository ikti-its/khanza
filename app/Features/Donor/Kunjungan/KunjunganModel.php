<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KunjunganModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new KunjunganDatabase(),
            [
                'id_kunjungan'      => V::DEFAULT(),
                'nomor_antrian'     => V::DEFAULT(),
                'nomor_kunjungan'   => V::DEFAULT(),
                'tanggal_kunjungan' => V::DEFAULT(),
            ],
            [
                'id_pendonor' => [
                    'nomor_pendonor',
                    'id_orang'  => [
                        'nama',
                        'nik',
                        'tanggal_lahir',
                        'id_jenis_kelamin'  => ['nama_jenis_kelamin'],
                        'id_golongan_darah' => ['nama_golongan_darah']
                    ],
                    'id_rhesus' => ['kode_rhesus']
                ],
            ],
        );
    }
}
