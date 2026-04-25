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
                [0, 'ID Catatan Anestesi',   'id_catatan_anestesi',  'indeks',  0],
                [1, 'Nomor Registrasi',       'nomor_reg',            'teks',    1],
                [1, 'Waktu Catatan',          'waktu_catatan',        'tanggal', 1],
                [1, 'Diagnosa Pra Bedah',     'diagnosa_pra_bedah',   'teks',    1],
                [1, 'Tindakan',               'tindakan',             'teks',    1],
                [1, 'Diagnosa Paska Bedah',   'diagnosa_paska_bedah', 'teks',    1],
                [1, 'Kode DPJP Anestesi',     'kode_dpjp_anestesi',  'teks',    1],
                [1, 'Kode DPJP Bedah',        'kode_dpjp_bedah',     'teks',    1],
                [1, 'ID Perawat Anestesi',    'id_perawat_anestesi',  'teks',    1],
                [1, 'ID Perawat Bedah',       'id_perawat_bedah',     'teks',    1],
                [1, 'Jam Pengkajian',         'jam_pengkajian',       'jam', 1],
                [1, 'Kesadaran',              'id_kesadaran',         'indeks',  1],
                [1, 'Sistolik',               'sistolik',             'jumlah',  1],
                [1, 'Diastolik',              'diastolik',            'jumlah',  1],
                [1, 'Nadi',                   'nadi',                 'jumlah',  1],
                [1, 'Respiratory Rate',       'respiratory_rate',     'jumlah',  1],
                [1, 'Suhu',                   'suhu',                 'suhu',    1],
                [1, 'Saturasi O2',            'saturasi_o2',          'jumlah',  1],
                [1, 'Tinggi Badan (cm)',       'tinggi_badan_cm',      'jumlah',  1],
                [1, 'Berat Badan (kg)',        'berat_badan_kg',       'jumlah',  1],
                [1, 'Golongan Darah',          'id_golongan_darah',    'indeks',  1],
                [1, 'Rhesus',                  'id_rhesus',            'indeks',  1],
                [1, 'Hemoglobin',              'hemoglobin',           'jumlah',  1],
                [1, 'Hematokrit',              'hematokrit',           'jumlah',  1],
                [1, 'Leukosit',                'leukosit',             'jumlah',  1],
                [1, 'Trombosit',               'trombosit',            'jumlah',  1],
                [1, 'Bleeding Time (BT)',       'bleeding_time_bt',     'jumlah',  1],
                [1, 'Clotting Time (CT)',       'clotting_time_ct',     'jumlah',  1],
                [1, 'Gula Darah Sewaktu',      'gula_darah_sewaktu',   'jumlah',  1],
                [1, 'Klinis Lain-lain',         'klinis_lain_lain',     'teks',    1],
                [1, 'ASA',                      'id_asa',               'indeks',  1],
                [1, 'Alergi',                   'is_alergi',            'status',  1],
                [1, 'Keterangan Alergi',        'ket_alergi',           'teks',    1],
                [1, 'Penyulit Pra',             'penyulit_pra',         'teks',    1],
                [1, 'Lanjut Tindakan',          'is_lanjut_tindakan',   'status',  1],
                [1, 'Jenis Sedasi',             'id_jenis_sedasi',      'indeks',  1],
                [1, 'Keterangan Sedasi',        'ket_sedasi',           'teks',    1],
                [1, 'Epidural',                 'is_epidural',          'status',  1],
                [1, 'Spinal',                   'is_spinal',            'status',  1],
                [1, 'Anestesi Umum',            'is_anestesi_umum',     'status',  1],
                [1, 'Keterangan Anestesi Umum', 'ket_anestesi_umum',    'teks',    1],
                [1, 'Blok Perifer',             'is_blok_perifer',      'status',  1],
                [1, 'Keterangan Blok Perifer',  'ket_blok_perifer',     'teks',    1],
                [1, 'Batal Tindakan',           'is_batal_tindakan',    'status',  1],
                [1, 'Alasan Batal',             'alasan_batal',         'teks',    1],
            ],
        );
    }
}