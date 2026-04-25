<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabHeader;

use App\Core\ModelTemplate;

final class PermintaanLabHeaderModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'permintaan_lab_header',
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
                'id_kategori_lab' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_perujuk' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tgl_permintaan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'indikasi_klinis' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'informasi_tambahan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_status_permintaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}