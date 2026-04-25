<?php
declare(strict_types=1);

namespace App\Features\Operasi\SignoutSebelumTutupLuka;
use App\Core\Controller\ControllerTemplate;

final class SignoutSebelumTutupLukaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new SignoutSebelumTutupLukaModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Sign Out Sebelum Tutup Luka', 'icon' => 'signout_sebelum_tutupluka'],
            ],
            judul: 'Sign Out Sebelum Tutup Luka',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Sign Out',            'id_signout',             'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',        'nomor_reg',              'teks',    REQUIRED],
                [SHOW, 'Waktu Sign Out',          'waktu_signout',          'tanggal', REQUIRED],
                [SHOW, 'SN/CN',                   'sn_cn',                  'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',       'kode_dokter_bedah',      'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',    'kode_dokter_anestesi',   'teks',    REQUIRED],
                [SHOW, 'Tindakan',                'tindakan',               'teks',    REQUIRED],
                [SHOW, 'Nama Tindakan Sesuai',    'is_nama_tindakan_sesuai','status',  REQUIRED],
                [SHOW, 'Kasa Lengkap',            'is_kasa_lengkap',        'status',  REQUIRED],
                [SHOW, 'Instrumen Lengkap',       'is_instrumen_lengkap',   'status',  REQUIRED],
                [SHOW, 'Alat Tajam Lengkap',      'is_alat_tajam_lengkap',  'status',  REQUIRED],
                [SHOW, 'Label Spesimen',          'id_label_spesimen',      'indeks',  REQUIRED],
                [SHOW, 'Formulir Spesimen',       'id_formulir_spesimen',   'indeks',  REQUIRED],
                [SHOW, 'Konfirmasi Bedah',        'is_konfirmasi_bedah',    'status',  REQUIRED],
                [SHOW, 'Konfirmasi Anestesi',     'is_konfirmasi_anestesi', 'status',  REQUIRED],
                [SHOW, 'Konfirmasi Perawat',      'is_konfirmasi_perawat',  'status',  REQUIRED],
                [SHOW, 'Catatan Pemulihan',       'catatan_pemulihan',      'teks',    REQUIRED],
                [SHOW, 'ID Perawat OK',           'id_perawat_ok',          'teks',    REQUIRED],
            ],
        );
    }
}