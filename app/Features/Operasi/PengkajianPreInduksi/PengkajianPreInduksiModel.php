<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksi;

use App\Core\ModelTemplate;

final class PengkajianPreInduksiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'pengkajian_pre_induksi',
            'id_pengkajian',
            [
                'id_pengkajian' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_pengkajian' => [
                    'allowed' => true,
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
                'elektrokardiogram' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'vital_lain_lain' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_sesuai_asesmen' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'perencanaan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'infus_perifer' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'kateter_vena_sentral_cvc' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_posisi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_premedikasi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_premedikasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_induksi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_induksi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_intubasi_sesudah_tidur' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_intubasi_oral' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_intubasi_tracheostomi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'intubasi_keterangan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'sulit_ventilasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'sulit_intubasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'ventilasi_keterangan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'teknik_regional_jenis' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'teknik_regional_lokasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'teknik_regional_jarum' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_kateter' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'kateter_fiksasi_cm' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'obat_obatan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'komplikasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'hasil' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}