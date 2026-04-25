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
                [HIDE, 'ID Penyerahan',              'id_penyerahan',            I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',            'nomor_reg',                I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Masuk Asal',            'waktu_masuk_asal',         I::DATE, REQUIRED],
                [SHOW, 'Waktu Pindah',                'waktu_pindah',             I::DATE, REQUIRED],
                [SHOW, 'Indikasi',                    'id_indikasi',              I::INDEX,  REQUIRED],
                [SHOW, 'Keterangan Indikasi',         'ket_indikasi',             I::TEXT,    REQUIRED],
                [SHOW, 'Ruang Asal',                  'id_ruang_asal',            I::INDEX,  REQUIRED],
                [SHOW, 'Ruang Selanjutnya',           'id_ruang_selanjutnya',     I::INDEX,  REQUIRED],
                [SHOW, 'Metode',                      'id_metode',                I::INDEX,  REQUIRED],
                [SHOW, 'Diagnosa Utama',              'diagnosa_utama',           I::TEXT,    REQUIRED],
                [SHOW, 'Diagnosa Sekunder',           'diagnosa_sekunder',        I::TEXT,    REQUIRED],
                [SHOW, 'Prosedur Dilakukan',          'prosedur_dilakukan',       I::TEXT,    REQUIRED],
                [SHOW, 'Obat Diberikan',              'obat_diberikan',           I::TEXT,    REQUIRED],
                [SHOW, 'Pemeriksaan Penunjang',       'pemeriksaan_penunjang',    I::TEXT,    REQUIRED],
                [SHOW, 'Disetujui',                   'is_disetujui',             I::SELECT,  REQUIRED],
                [SHOW, 'Nama Pemberi Persetujuan',    'nama_pemberi_persetujuan', I::TEXT,    REQUIRED],
                [SHOW, 'Hubungan',                    'id_hubungan',              I::INDEX,  REQUIRED],
                [SHOW, 'Keadaan Asal',                'asal_id_keadaan',          I::INDEX,  REQUIRED],
                [SHOW, 'Sistolik Asal',               'asal_sistolik',            I::NUMBER,  REQUIRED],
                [SHOW, 'Diastolik Asal',              'asal_diastolik',           I::NUMBER,  REQUIRED],
                [SHOW, 'Nadi Asal',                   'asal_nadi',                I::NUMBER,  REQUIRED],
                [SHOW, 'Respiratory Rate Asal',       'asal_respiratory_rate',    I::NUMBER,  REQUIRED],
                [SHOW, 'Suhu Asal',                   'asal_suhu',                'suhu',    REQUIRED],
                [SHOW, 'Keluhan Asal',                'asal_keluhan',             I::TEXT,    REQUIRED],
                [SHOW, 'Keadaan Tiba',                'tiba_id_keadaan',          I::INDEX,  REQUIRED],
                [SHOW, 'Sistolik Tiba',               'tiba_sistolik',            I::NUMBER,  REQUIRED],
                [SHOW, 'Diastolik Tiba',              'tiba_diastolik',           I::NUMBER,  REQUIRED],
                [SHOW, 'Nadi Tiba',                   'tiba_nadi',                I::NUMBER,  REQUIRED],
                [SHOW, 'Respiratory Rate Tiba',       'tiba_respiratory_rate',    I::NUMBER,  REQUIRED],
                [SHOW, 'Suhu Tiba',                   'tiba_suhu',                'suhu',    REQUIRED],
                [SHOW, 'Keluhan Tiba',                'tiba_keluhan',             I::TEXT,    REQUIRED],
                [SHOW, 'Perawat Menyerahkan',         'id_perawat_menyerahkan',   I::TEXT,    REQUIRED],
                [SHOW, 'Perawat Menerima',            'id_perawat_menerima',      I::TEXT,    REQUIRED],
            ],
        );
    }
}