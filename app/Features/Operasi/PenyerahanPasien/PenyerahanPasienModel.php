<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasien;

use App\Core\ModelTemplate;

final class PenyerahanPasienModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'penyerahan_pasien',
            'id_penyerahan',
            [
                'id_penyerahan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_masuk_asal' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_pindah' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_indikasi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_indikasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_ruang_asal' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_ruang_selanjutnya' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_metode' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'diagnosa_utama' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'diagnosa_sekunder' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'prosedur_dilakukan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'obat_diberikan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'pemeriksaan_penunjang' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_disetujui' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_pemberi_persetujuan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_hubungan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'asal_id_keadaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'asal_sistolik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'asal_diastolik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'asal_nadi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'asal_respiratory_rate' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'asal_suhu' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'asal_keluhan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tiba_id_keadaan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tiba_sistolik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tiba_diastolik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tiba_nadi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tiba_respiratory_rate' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tiba_suhu' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tiba_keluhan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_perawat_menyerahkan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_perawat_menerima' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}