<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRad;
use App\Core\Model\ModelTemplate;

final class HasilRadModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'radiologi',
            'hasil_rad',
            'id_hasil_rad',
            [
                'id_hasil_rad' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_permintaan_rad' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_pj' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_petugas_rad' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_perujuk' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tgl_jam_hasil' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'catatan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}