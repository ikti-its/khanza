<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabPa;

use App\Core\ModelTemplate;

final class HasilLabPaModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'hasil_lab_pa',
            'id_hasil_pa',
            [
                'id_hasil_pa' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_permintaan_lab' => [
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
                'id_petugas_lab' => [
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
                'id_item_pemeriksaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'diagnosa_klinis' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'makroskopik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'mikroskopik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'kesimpulan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'kesan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}