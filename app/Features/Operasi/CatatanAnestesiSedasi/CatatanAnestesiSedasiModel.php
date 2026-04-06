<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasi;

use App\Core\ModelTemplate;

class CatatanAnestesiSedasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'catatan_anestesi_sedasi',
            'id_catatan_anestesi',
            [
                'id_catatan_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_catatan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'diagnosa_pra_bedah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tindakan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'diagnosa_paska_bedah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dpjp_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dpjp_bedah' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_perawat_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_perawat_bedah' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'jam_pengkajian' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_kesadaran' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'sistolik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'diastolik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'nadi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'respiratory_rate' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'suhu' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'saturasi_o2' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tinggi_badan_cm' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'berat_badan_kg' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_golongan_darah' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_rhesus' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'hemoglobin' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'hematokrit' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'leukosit' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'trombosit' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'bleeding_time_bt' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'clotting_time_ct' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'gula_darah_sewaktu' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'klinis_lain_lain' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_asa' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_alergi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_alergi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'penyulit_pra' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_lanjut_tindakan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_jenis_sedasi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_sedasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_epidural' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_spinal' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_anestesi_umum' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_anestesi_umum' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_blok_perifer' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_blok_perifer' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_batal_tindakan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'alasan_batal' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}