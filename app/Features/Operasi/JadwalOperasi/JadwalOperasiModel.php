<?php
declare(strict_types=1);

namespace App\Features\Operasi\JadwalOperasi;

use App\Core\ModelTemplate;

class JadwalOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'jadwal_operasi',
            'id_jadwal',
            [
                'id_jadwal' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_permintaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_ruangan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_tindakan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_bedah' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tanggal' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_mulai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_selesai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_status' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}