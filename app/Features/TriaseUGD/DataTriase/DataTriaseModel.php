<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriase;

use App\Core\ModelTemplate;

final class DataTriaseModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'triase_ugd',
            'data_triase',
            'id_triase',
            [
                'id_triase' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_kunjungan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_cara_masuk' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_alat_transportasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_alasan_kedatangan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'keterangan_kedatangan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_macam_kasus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'sistolik' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'diastolik' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nadi' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'pernapasan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'suhu' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'saturasi_o2' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nyeri' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}