<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_pengkajian' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter' => V::TODO(),
                'waktu_pengkajian' => V::TODO(),
                'sistolik' => V::TODO(),
                'diastolik' => V::TODO(),
                'nadi' => V::TODO(),
                'respiratory_rate' => V::TODO(),
                'suhu' => V::TODO(),
                'elektrokardiogram' => V::TODO(),
                'vital_lain_lain' => V::TODO(),
                'is_sesuai_asesmen' => V::TODO(),
                'perencanaan' => V::TODO(),
                'infus_perifer' => V::TODO(),
                'kateter_vena_sentral_cvc' => V::TODO(),
                'id_posisi' => V::TODO(),
                'id_premedikasi' => V::TODO(),
                'ket_premedikasi' => V::TODO(),
                'id_induksi' => V::TODO(),
                'ket_induksi' => V::TODO(),
                'is_intubasi_sesudah_tidur' => V::TODO(),
                'is_intubasi_oral' => V::TODO(),
                'is_intubasi_tracheostomi' => V::TODO(),
                'intubasi_keterangan' => V::TODO(),
                'sulit_ventilasi' => V::TODO(),
                'sulit_intubasi' => V::TODO(),
                'ventilasi_keterangan' => V::TODO(),
                'teknik_regional_jenis' => V::TODO(),
                'teknik_regional_lokasi' => V::TODO(),
                'teknik_regional_jarum' => V::TODO(),
                'is_kateter' => V::TODO(),
                'kateter_fiksasi_cm' => V::TODO(),
                'obat_obatan' => V::TODO(),
                'komplikasi' => V::TODO(),
                'hasil' => V::TODO(),
            ],
        );
    }
}