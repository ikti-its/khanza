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
                [HIDE, 'ID Pengkajian',             'id_pengkajian',            'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',           'nomor_reg',                'teks',    REQUIRED],
                [SHOW, 'Kode Dokter',                'kode_dokter',              'teks',    REQUIRED],
                [SHOW, 'Waktu Pengkajian',           'waktu_pengkajian',         'tanggal', REQUIRED],
                [SHOW, 'Sistolik',                   'sistolik',                 'jumlah',  REQUIRED],
                [SHOW, 'Diastolik',                  'diastolik',                'jumlah',  REQUIRED],
                [SHOW, 'Nadi',                       'nadi',                     'jumlah',  REQUIRED],
                [SHOW, 'Respiratory Rate',           'respiratory_rate',         'jumlah',  REQUIRED],
                [SHOW, 'Suhu',                       'suhu',                     'suhu',    REQUIRED],
                [SHOW, 'Elektrokardiogram',          'elektrokardiogram',        'teks',    REQUIRED],
                [SHOW, 'Vital Lain-lain',            'vital_lain_lain',          'teks',    REQUIRED],
                [SHOW, 'Sesuai Asesmen',             'is_sesuai_asesmen',        'status',  REQUIRED],
                [SHOW, 'Perencanaan',                'perencanaan',              'teks',    REQUIRED],
                [SHOW, 'Infus Perifer',              'infus_perifer',            'teks',    REQUIRED],
                [SHOW, 'Kateter Vena Sentral (CVC)', 'kateter_vena_sentral_cvc', 'teks',    REQUIRED],
                [SHOW, 'Posisi',                     'id_posisi',                'indeks',  REQUIRED],
                [SHOW, 'Premedikasi',                'id_premedikasi',           'indeks',  REQUIRED],
                [SHOW, 'Keterangan Premedikasi',     'ket_premedikasi',          'teks',    REQUIRED],
                [SHOW, 'Induksi',                    'id_induksi',               'indeks',  REQUIRED],
                [SHOW, 'Keterangan Induksi',         'ket_induksi',              'teks',    REQUIRED],
                [SHOW, 'Intubasi Sesudah Tidur',     'is_intubasi_sesudah_tidur','status',  REQUIRED],
                [SHOW, 'Intubasi Oral',              'is_intubasi_oral',         'status',  REQUIRED],
                [SHOW, 'Intubasi Tracheostomi',      'is_intubasi_tracheostomi', 'status',  REQUIRED],
                [SHOW, 'Keterangan Intubasi',        'intubasi_keterangan',      'teks',    REQUIRED],
                [SHOW, 'Sulit Ventilasi',            'sulit_ventilasi',          'teks',    REQUIRED],
                [SHOW, 'Sulit Intubasi',             'sulit_intubasi',           'teks',    REQUIRED],
                [SHOW, 'Keterangan Ventilasi',       'ventilasi_keterangan',     'teks',    REQUIRED],
                [SHOW, 'Teknik Regional Jenis',      'teknik_regional_jenis',    'teks',    REQUIRED],
                [SHOW, 'Teknik Regional Lokasi',     'teknik_regional_lokasi',   'teks',    REQUIRED],
                [SHOW, 'Teknik Regional Jarum',      'teknik_regional_jarum',    'teks',    REQUIRED],
                [SHOW, 'Kateter',                    'is_kateter',               'status',  REQUIRED],
                [SHOW, 'Kateter Fiksasi (cm)',        'kateter_fiksasi_cm',       'jumlah',  REQUIRED],
                [SHOW, 'Obat-obatan',                'obat_obatan',              'teks',    REQUIRED],
                [SHOW, 'Komplikasi',                 'komplikasi',               'teks',    REQUIRED],
                [SHOW, 'Hasil',                      'hasil',                    'teks',    REQUIRED],
            ],
        );
    }
}