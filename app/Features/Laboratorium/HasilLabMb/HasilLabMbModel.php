<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabMb;
use App\Core\Model\ModelTemplate;

final class HasilLabMbModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'hasil_lab_mb',
            'id_hasil_mb',
            [
                'id_hasil_mb' => [
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
                'id_parameter_pemeriksaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nilai_hasil' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'keterangan_hasil' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}