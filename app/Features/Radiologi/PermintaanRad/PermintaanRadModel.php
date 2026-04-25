<?php
declare(strict_types=1);

namespace App\Features\Radiologi\PermintaanRad;
use App\Core\Model\ModelTemplate;

final class PermintaanRadModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'radiologi',
            'permintaan_rad',
            'id_permintaan',
            [
                'id_permintaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'no_permintaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_perujuk' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tgl_jam_permintaan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'informasi_tambahan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'indikasi_klinis' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_status_permintaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_item_rad' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}