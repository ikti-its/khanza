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
            'BASE',
            'operasi',
            'jadwal_operasi',
            'id_jadwal',
            [
                'id_jadwal' => V::TODO(),
                'id_permintaan' => V::TODO(),
                'id_ruangan' => V::TODO(),
                'id_tindakan' => V::TODO(),
                'kode_dokter_bedah' => V::TODO(),
                'kode_dokter_anestesi' => V::TODO(),
                'tanggal' => V::TODO(),
                'waktu_mulai' => V::TODO(),
                'waktu_selesai' => V::TODO(),
                'id_status' => V::TODO(),
            ],
        );
    }
}