<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasien;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_penyerahan' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'waktu_masuk_asal' => V::TODO(),
                'waktu_pindah' => V::TODO(),
                'id_indikasi' => V::TODO(),
                'ket_indikasi' => V::TODO(),
                'id_ruang_asal' => V::TODO(),
                'id_ruang_selanjutnya' => V::TODO(),
                'id_metode' => V::TODO(),
                'diagnosa_utama' => V::TODO(),
                'diagnosa_sekunder' => V::TODO(),
                'prosedur_dilakukan' => V::TODO(),
                'obat_diberikan' => V::TODO(),
                'pemeriksaan_penunjang' => V::TODO(),
                'is_disetujui' => V::TODO(),
                'nama_pemberi_persetujuan' => V::TODO(),
                'id_hubungan' => V::TODO(),
                'asal_id_keadaan' => V::TODO(),
                'asal_sistolik' => V::TODO(),
                'asal_diastolik' => V::TODO(),
                'asal_nadi' => V::TODO(),
                'asal_respiratory_rate' => V::TODO(),
                'asal_suhu' => V::TODO(),
                'asal_keluhan' => V::TODO(),
                'tiba_id_keadaan' => V::TODO(),
                'tiba_sistolik' => V::TODO(),
                'tiba_diastolik' => V::TODO(),
                'tiba_nadi' => V::TODO(),
                'tiba_respiratory_rate' => V::TODO(),
                'tiba_suhu' => V::TODO(),
                'tiba_keluhan' => V::TODO(),
                'id_perawat_menyerahkan' => V::TODO(),
                'id_perawat_menerima' => V::TODO(),
            ],
        );
    }
}