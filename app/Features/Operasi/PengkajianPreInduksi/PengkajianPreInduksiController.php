<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PengkajianPreInduksiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengkajianPreInduksiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Pengkajian Pre Induksi', 'icon' => 'pengkajian_pre_induksi'],
            ],
            judul: 'Pengkajian Pre Induksi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Pengkajian',             'id_pengkajian',            I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',           'nomor_reg',                I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter',                'kode_dokter',              I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Pengkajian',           'waktu_pengkajian',         I::DATE, REQUIRED],
                [SHOW, 'Sistolik',                   'sistolik',                 I::NUMBER,  REQUIRED],
                [SHOW, 'Diastolik',                  'diastolik',                I::NUMBER,  REQUIRED],
                [SHOW, 'Nadi',                       'nadi',                     I::NUMBER,  REQUIRED],
                [SHOW, 'Respiratory Rate',           'respiratory_rate',         I::NUMBER,  REQUIRED],
                [SHOW, 'Suhu',                       'suhu',                     'suhu',    REQUIRED],
                [SHOW, 'Elektrokardiogram',          'elektrokardiogram',        I::TEXT,    REQUIRED],
                [SHOW, 'Vital Lain-lain',            'vital_lain_lain',          I::TEXT,    REQUIRED],
                [SHOW, 'Sesuai Asesmen',             'is_sesuai_asesmen',        I::SELECT,  REQUIRED],
                [SHOW, 'Perencanaan',                'perencanaan',              I::TEXT,    REQUIRED],
                [SHOW, 'Infus Perifer',              'infus_perifer',            I::TEXT,    REQUIRED],
                [SHOW, 'Kateter Vena Sentral (CVC)', 'kateter_vena_sentral_cvc', I::TEXT,    REQUIRED],
                [SHOW, 'Posisi',                     'id_posisi',                I::INDEX,  REQUIRED],
                [SHOW, 'Premedikasi',                'id_premedikasi',           I::INDEX,  REQUIRED],
                [SHOW, 'Keterangan Premedikasi',     'ket_premedikasi',          I::TEXT,    REQUIRED],
                [SHOW, 'Induksi',                    'id_induksi',               I::INDEX,  REQUIRED],
                [SHOW, 'Keterangan Induksi',         'ket_induksi',              I::TEXT,    REQUIRED],
                [SHOW, 'Intubasi Sesudah Tidur',     'is_intubasi_sesudah_tidur',I::SELECT,  REQUIRED],
                [SHOW, 'Intubasi Oral',              'is_intubasi_oral',         I::SELECT,  REQUIRED],
                [SHOW, 'Intubasi Tracheostomi',      'is_intubasi_tracheostomi', I::SELECT,  REQUIRED],
                [SHOW, 'Keterangan Intubasi',        'intubasi_keterangan',      I::TEXT,    REQUIRED],
                [SHOW, 'Sulit Ventilasi',            'sulit_ventilasi',          I::TEXT,    REQUIRED],
                [SHOW, 'Sulit Intubasi',             'sulit_intubasi',           I::TEXT,    REQUIRED],
                [SHOW, 'Keterangan Ventilasi',       'ventilasi_keterangan',     I::TEXT,    REQUIRED],
                [SHOW, 'Teknik Regional Jenis',      'teknik_regional_jenis',    I::TEXT,    REQUIRED],
                [SHOW, 'Teknik Regional Lokasi',     'teknik_regional_lokasi',   I::TEXT,    REQUIRED],
                [SHOW, 'Teknik Regional Jarum',      'teknik_regional_jarum',    I::TEXT,    REQUIRED],
                [SHOW, 'Kateter',                    'is_kateter',               I::SELECT,  REQUIRED],
                [SHOW, 'Kateter Fiksasi (cm)',        'kateter_fiksasi_cm',       I::NUMBER,  REQUIRED],
                [SHOW, 'Obat-obatan',                'obat_obatan',              I::TEXT,    REQUIRED],
                [SHOW, 'Komplikasi',                 'komplikasi',               I::TEXT,    REQUIRED],
                [SHOW, 'Hasil',                      'hasil',                    I::TEXT,    REQUIRED],
            ],
        );
    }
}