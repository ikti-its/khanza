<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreInduksi;
use App\Core\Controller\ControllerTemplate;

class PengkajianPreInduksiController extends ControllerTemplate
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
                [0, 'ID Pengkajian',             'id_pengkajian',            'indeks',  0],
                [1, 'Nomor Registrasi',           'nomor_reg',                'teks',    1],
                [1, 'Kode Dokter',                'kode_dokter',              'teks',    1],
                [1, 'Waktu Pengkajian',           'waktu_pengkajian',         'tanggal', 1],
                [1, 'Sistolik',                   'sistolik',                 'jumlah',  1],
                [1, 'Diastolik',                  'diastolik',                'jumlah',  1],
                [1, 'Nadi',                       'nadi',                     'jumlah',  1],
                [1, 'Respiratory Rate',           'respiratory_rate',         'jumlah',  1],
                [1, 'Suhu',                       'suhu',                     'suhu',    1],
                [1, 'Elektrokardiogram',          'elektrokardiogram',        'teks',    1],
                [1, 'Vital Lain-lain',            'vital_lain_lain',          'teks',    1],
                [1, 'Sesuai Asesmen',             'is_sesuai_asesmen',        'status',  1],
                [1, 'Perencanaan',                'perencanaan',              'teks',    1],
                [1, 'Infus Perifer',              'infus_perifer',            'teks',    1],
                [1, 'Kateter Vena Sentral (CVC)', 'kateter_vena_sentral_cvc', 'teks',    1],
                [1, 'Posisi',                     'id_posisi',                'indeks',  1],
                [1, 'Premedikasi',                'id_premedikasi',           'indeks',  1],
                [1, 'Keterangan Premedikasi',     'ket_premedikasi',          'teks',    1],
                [1, 'Induksi',                    'id_induksi',               'indeks',  1],
                [1, 'Keterangan Induksi',         'ket_induksi',              'teks',    1],
                [1, 'Intubasi Sesudah Tidur',     'is_intubasi_sesudah_tidur','status',  1],
                [1, 'Intubasi Oral',              'is_intubasi_oral',         'status',  1],
                [1, 'Intubasi Tracheostomi',      'is_intubasi_tracheostomi', 'status',  1],
                [1, 'Keterangan Intubasi',        'intubasi_keterangan',      'teks',    1],
                [1, 'Sulit Ventilasi',            'sulit_ventilasi',          'teks',    1],
                [1, 'Sulit Intubasi',             'sulit_intubasi',           'teks',    1],
                [1, 'Keterangan Ventilasi',       'ventilasi_keterangan',     'teks',    1],
                [1, 'Teknik Regional Jenis',      'teknik_regional_jenis',    'teks',    1],
                [1, 'Teknik Regional Lokasi',     'teknik_regional_lokasi',   'teks',    1],
                [1, 'Teknik Regional Jarum',      'teknik_regional_jarum',    'teks',    1],
                [1, 'Kateter',                    'is_kateter',               'status',  1],
                [1, 'Kateter Fiksasi (cm)',        'kateter_fiksasi_cm',       'jumlah',  1],
                [1, 'Obat-obatan',                'obat_obatan',              'teks',    1],
                [1, 'Komplikasi',                 'komplikasi',               'teks',    1],
                [1, 'Hasil',                      'hasil',                    'teks',    1],
            ],
        );
    }
}