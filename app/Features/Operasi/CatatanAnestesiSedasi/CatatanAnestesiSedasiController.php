<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasi;
use App\Core\Controller\ControllerTemplate;

final class CatatanAnestesiSedasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new CatatanAnestesiSedasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Catatan Anestesi Sedasi', 'icon' => 'catatan_anestesi_sedasi'],
            ],
            judul: 'Catatan Anestesi Sedasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Catatan Anestesi',   'id_catatan_anestesi',  'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',       'nomor_reg',            'teks',    REQUIRED],
                [SHOW, 'Waktu Catatan',          'waktu_catatan',        'tanggal', REQUIRED],
                [SHOW, 'Diagnosa Pra Bedah',     'diagnosa_pra_bedah',   'teks',    REQUIRED],
                [SHOW, 'Tindakan',               'tindakan',             'teks',    REQUIRED],
                [SHOW, 'Diagnosa Paska Bedah',   'diagnosa_paska_bedah', 'teks',    REQUIRED],
                [SHOW, 'Kode DPJP Anestesi',     'kode_dpjp_anestesi',  'teks',    REQUIRED],
                [SHOW, 'Kode DPJP Bedah',        'kode_dpjp_bedah',     'teks',    REQUIRED],
                [SHOW, 'ID Perawat Anestesi',    'id_perawat_anestesi',  'teks',    REQUIRED],
                [SHOW, 'ID Perawat Bedah',       'id_perawat_bedah',     'teks',    REQUIRED],
                [SHOW, 'Jam Pengkajian',         'jam_pengkajian',       'jam', REQUIRED],
                [SHOW, 'Kesadaran',              'id_kesadaran',         'indeks',  REQUIRED],
                [SHOW, 'Sistolik',               'sistolik',             'jumlah',  REQUIRED],
                [SHOW, 'Diastolik',              'diastolik',            'jumlah',  REQUIRED],
                [SHOW, 'Nadi',                   'nadi',                 'jumlah',  REQUIRED],
                [SHOW, 'Respiratory Rate',       'respiratory_rate',     'jumlah',  REQUIRED],
                [SHOW, 'Suhu',                   'suhu',                 'suhu',    REQUIRED],
                [SHOW, 'Saturasi O2',            'saturasi_o2',          'jumlah',  REQUIRED],
                [SHOW, 'Tinggi Badan (cm)',       'tinggi_badan_cm',      'jumlah',  REQUIRED],
                [SHOW, 'Berat Badan (kg)',        'berat_badan_kg',       'jumlah',  REQUIRED],
                [SHOW, 'Golongan Darah',          'id_golongan_darah',    'indeks',  REQUIRED],
                [SHOW, 'Rhesus',                  'id_rhesus',            'indeks',  REQUIRED],
                [SHOW, 'Hemoglobin',              'hemoglobin',           'jumlah',  REQUIRED],
                [SHOW, 'Hematokrit',              'hematokrit',           'jumlah',  REQUIRED],
                [SHOW, 'Leukosit',                'leukosit',             'jumlah',  REQUIRED],
                [SHOW, 'Trombosit',               'trombosit',            'jumlah',  REQUIRED],
                [SHOW, 'Bleeding Time (BT)',       'bleeding_time_bt',     'jumlah',  REQUIRED],
                [SHOW, 'Clotting Time (CT)',       'clotting_time_ct',     'jumlah',  REQUIRED],
                [SHOW, 'Gula Darah Sewaktu',      'gula_darah_sewaktu',   'jumlah',  REQUIRED],
                [SHOW, 'Klinis Lain-lain',         'klinis_lain_lain',     'teks',    REQUIRED],
                [SHOW, 'ASA',                      'id_asa',               'indeks',  REQUIRED],
                [SHOW, 'Alergi',                   'is_alergi',            'status',  REQUIRED],
                [SHOW, 'Keterangan Alergi',        'ket_alergi',           'teks',    REQUIRED],
                [SHOW, 'Penyulit Pra',             'penyulit_pra',         'teks',    REQUIRED],
                [SHOW, 'Lanjut Tindakan',          'is_lanjut_tindakan',   'status',  REQUIRED],
                [SHOW, 'Jenis Sedasi',             'id_jenis_sedasi',      'indeks',  REQUIRED],
                [SHOW, 'Keterangan Sedasi',        'ket_sedasi',           'teks',    REQUIRED],
                [SHOW, 'Epidural',                 'is_epidural',          'status',  REQUIRED],
                [SHOW, 'Spinal',                   'is_spinal',            'status',  REQUIRED],
                [SHOW, 'Anestesi Umum',            'is_anestesi_umum',     'status',  REQUIRED],
                [SHOW, 'Keterangan Anestesi Umum', 'ket_anestesi_umum',    'teks',    REQUIRED],
                [SHOW, 'Blok Perifer',             'is_blok_perifer',      'status',  REQUIRED],
                [SHOW, 'Keterangan Blok Perifer',  'ket_blok_perifer',     'teks',    REQUIRED],
                [SHOW, 'Batal Tindakan',           'is_batal_tindakan',    'status',  REQUIRED],
                [SHOW, 'Alasan Batal',             'alasan_batal',         'teks',    REQUIRED],
            ],
        );
    }
}