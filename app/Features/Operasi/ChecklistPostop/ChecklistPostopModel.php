<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostop;

use App\Core\ModelTemplate;

final class ChecklistPostopModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'checklist_postop',
            'id_checklist_post',
            [
                'id_checklist_post' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_checklist' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'sn_cn' => [
                    'allowed' => true,
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
                'tindakan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_kesadaran_pascaop' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'jenis_cairan_infus' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_jaringan_pa_vc' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_kateter_urine' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_petugas_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_petugas_ok' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}