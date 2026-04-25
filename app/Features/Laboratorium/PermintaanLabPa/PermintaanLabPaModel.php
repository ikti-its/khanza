<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPa;
use App\Core\Model\ModelTemplate;

final class PermintaanLabPaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'permintaan_lab_pa',
            'id_permintaan_pa',
            [
                'id_permintaan_pa' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_permintaan_lab' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tgl_pengambilan_bahan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'metode_diperoleh' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'lokasi_jaringan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'bahan_pengawet' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'riwayat_lokasi_lab' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'riwayat_tgl_sebelumnya' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'riwayat_no_pa_sebelumnya' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'riwayat_diagnosa_sebelumnya' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_item_pemeriksaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}