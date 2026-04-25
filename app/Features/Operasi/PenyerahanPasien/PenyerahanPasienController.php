<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasien;
use App\Core\Controller\ControllerTemplate;

final class PenyerahanPasienController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PenyerahanPasienModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Penyerahan Pasien', 'icon' => 'penyerahan_pasien'],
            ],
            judul: 'Penyerahan Pasien',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Penyerahan',              'id_penyerahan',            'indeks',  0],
                [1, 'Nomor Registrasi',            'nomor_reg',                'teks',    1],
                [1, 'Waktu Masuk Asal',            'waktu_masuk_asal',         'tanggal', 1],
                [1, 'Waktu Pindah',                'waktu_pindah',             'tanggal', 1],
                [1, 'Indikasi',                    'id_indikasi',              'indeks',  1],
                [1, 'Keterangan Indikasi',         'ket_indikasi',             'teks',    1],
                [1, 'Ruang Asal',                  'id_ruang_asal',            'indeks',  1],
                [1, 'Ruang Selanjutnya',           'id_ruang_selanjutnya',     'indeks',  1],
                [1, 'Metode',                      'id_metode',                'indeks',  1],
                [1, 'Diagnosa Utama',              'diagnosa_utama',           'teks',    1],
                [1, 'Diagnosa Sekunder',           'diagnosa_sekunder',        'teks',    1],
                [1, 'Prosedur Dilakukan',          'prosedur_dilakukan',       'teks',    1],
                [1, 'Obat Diberikan',              'obat_diberikan',           'teks',    1],
                [1, 'Pemeriksaan Penunjang',       'pemeriksaan_penunjang',    'teks',    1],
                [1, 'Disetujui',                   'is_disetujui',             'status',  1],
                [1, 'Nama Pemberi Persetujuan',    'nama_pemberi_persetujuan', 'teks',    1],
                [1, 'Hubungan',                    'id_hubungan',              'indeks',  1],
                [1, 'Keadaan Asal',                'asal_id_keadaan',          'indeks',  1],
                [1, 'Sistolik Asal',               'asal_sistolik',            'jumlah',  1],
                [1, 'Diastolik Asal',              'asal_diastolik',           'jumlah',  1],
                [1, 'Nadi Asal',                   'asal_nadi',                'jumlah',  1],
                [1, 'Respiratory Rate Asal',       'asal_respiratory_rate',    'jumlah',  1],
                [1, 'Suhu Asal',                   'asal_suhu',                'suhu',    1],
                [1, 'Keluhan Asal',                'asal_keluhan',             'teks',    1],
                [1, 'Keadaan Tiba',                'tiba_id_keadaan',          'indeks',  1],
                [1, 'Sistolik Tiba',               'tiba_sistolik',            'jumlah',  1],
                [1, 'Diastolik Tiba',              'tiba_diastolik',           'jumlah',  1],
                [1, 'Nadi Tiba',                   'tiba_nadi',                'jumlah',  1],
                [1, 'Respiratory Rate Tiba',       'tiba_respiratory_rate',    'jumlah',  1],
                [1, 'Suhu Tiba',                   'tiba_suhu',                'suhu',    1],
                [1, 'Keluhan Tiba',                'tiba_keluhan',             'teks',    1],
                [1, 'Perawat Menyerahkan',         'id_perawat_menyerahkan',   'teks',    1],
                [1, 'Perawat Menerima',            'id_perawat_menerima',      'teks',    1],
            ],
        );
    }
}