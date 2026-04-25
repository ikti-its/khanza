<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasien;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Penyerahan',              'id_penyerahan',            'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',            'nomor_reg',                'teks',    REQUIRED],
                [SHOW, 'Waktu Masuk Asal',            'waktu_masuk_asal',         'tanggal', REQUIRED],
                [SHOW, 'Waktu Pindah',                'waktu_pindah',             'tanggal', REQUIRED],
                [SHOW, 'Indikasi',                    'id_indikasi',              'indeks',  REQUIRED],
                [SHOW, 'Keterangan Indikasi',         'ket_indikasi',             'teks',    REQUIRED],
                [SHOW, 'Ruang Asal',                  'id_ruang_asal',            'indeks',  REQUIRED],
                [SHOW, 'Ruang Selanjutnya',           'id_ruang_selanjutnya',     'indeks',  REQUIRED],
                [SHOW, 'Metode',                      'id_metode',                'indeks',  REQUIRED],
                [SHOW, 'Diagnosa Utama',              'diagnosa_utama',           'teks',    REQUIRED],
                [SHOW, 'Diagnosa Sekunder',           'diagnosa_sekunder',        'teks',    REQUIRED],
                [SHOW, 'Prosedur Dilakukan',          'prosedur_dilakukan',       'teks',    REQUIRED],
                [SHOW, 'Obat Diberikan',              'obat_diberikan',           'teks',    REQUIRED],
                [SHOW, 'Pemeriksaan Penunjang',       'pemeriksaan_penunjang',    'teks',    REQUIRED],
                [SHOW, 'Disetujui',                   'is_disetujui',             'status',  REQUIRED],
                [SHOW, 'Nama Pemberi Persetujuan',    'nama_pemberi_persetujuan', 'teks',    REQUIRED],
                [SHOW, 'Hubungan',                    'id_hubungan',              'indeks',  REQUIRED],
                [SHOW, 'Keadaan Asal',                'asal_id_keadaan',          'indeks',  REQUIRED],
                [SHOW, 'Sistolik Asal',               'asal_sistolik',            'jumlah',  REQUIRED],
                [SHOW, 'Diastolik Asal',              'asal_diastolik',           'jumlah',  REQUIRED],
                [SHOW, 'Nadi Asal',                   'asal_nadi',                'jumlah',  REQUIRED],
                [SHOW, 'Respiratory Rate Asal',       'asal_respiratory_rate',    'jumlah',  REQUIRED],
                [SHOW, 'Suhu Asal',                   'asal_suhu',                'suhu',    REQUIRED],
                [SHOW, 'Keluhan Asal',                'asal_keluhan',             'teks',    REQUIRED],
                [SHOW, 'Keadaan Tiba',                'tiba_id_keadaan',          'indeks',  REQUIRED],
                [SHOW, 'Sistolik Tiba',               'tiba_sistolik',            'jumlah',  REQUIRED],
                [SHOW, 'Diastolik Tiba',              'tiba_diastolik',           'jumlah',  REQUIRED],
                [SHOW, 'Nadi Tiba',                   'tiba_nadi',                'jumlah',  REQUIRED],
                [SHOW, 'Respiratory Rate Tiba',       'tiba_respiratory_rate',    'jumlah',  REQUIRED],
                [SHOW, 'Suhu Tiba',                   'tiba_suhu',                'suhu',    REQUIRED],
                [SHOW, 'Keluhan Tiba',                'tiba_keluhan',             'teks',    REQUIRED],
                [SHOW, 'Perawat Menyerahkan',         'id_perawat_menyerahkan',   'teks',    REQUIRED],
                [SHOW, 'Perawat Menerima',            'id_perawat_menerima',      'teks',    REQUIRED],
            ],
        );
    }
}