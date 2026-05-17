<?php
declare(strict_types=1);

namespace App\Features\Operasi\JadwalOperasi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JadwalOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new JadwalOperasiDatabase(),
            'BASE',
            'operasi',
            'jadwal_operasi',
            'id_jadwal',
            [
                'id_jadwal'             => V::DEFAULT(),
                'id_permintaan'         => V::DEFAULT(),
                'id_ruangan'            => V::DEFAULT(),
                'id_tindakan'           => V::DEFAULT(),
                'kode_dokter_bedah'     => V::DEFAULT(),
                'kode_dokter_anestesi'  => V::DEFAULT(),
                'tanggal'               => V::DEFAULT(),
                'waktu_mulai'           => V::DEFAULT(),
                'waktu_selesai'         => V::DEFAULT(),
                'id_status'             => V::DEFAULT(),
            ],
            [
                'id_permintaan'         => [],
                'id_ruangan'            => ['kode_ruangan', 'nama_ruangan'],
                'id_tindakan'           => [],
                'kode_dokter_bedah'     => [],
                'kode_dokter_anestesi'  => [],
                'id_status'             => ['nama_status'],
            ]
        );
    }
}