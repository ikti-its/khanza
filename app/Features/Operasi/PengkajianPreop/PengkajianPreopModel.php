<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreop;
use App\Core\Model\ModelTemplate;

final class PengkajianPreopModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'pengkajian_preop',
            'id_pengkajian_pre',
            [
                'id_pengkajian_pre' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_bedah' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_pengkajian' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'ringkasan_klinik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'pemeriksaan_fisik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'pemeriksaan_diagnostik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'diagnosa_pre_operasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rencana_tindakan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'persiapan_khusus' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'terapi_pre_operasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}