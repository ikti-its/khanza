<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasi;

use App\Core\ModelTemplate;

final class ChecklistPreOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'checklist_pre_operasi',
            'id_checklist',
            [
                'id_checklist' => [
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
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_identitas_sesuai' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_keadaan_umum' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_penandaan_area' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_ijin_bedah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_ijin_anestesi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_ijin_transfusi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_persiapan_darah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_persiapan_darah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_perlengkapan_khusus' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_petugas_ruangan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_petugas_ok' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}