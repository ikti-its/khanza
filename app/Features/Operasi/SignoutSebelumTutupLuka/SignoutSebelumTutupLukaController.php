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
                [0, 'ID Sign Out',            'id_signout',             'indeks',  0],
                [1, 'Nomor Registrasi',        'nomor_reg',              'teks',    1],
                [1, 'Waktu Sign Out',          'waktu_signout',          'tanggal', 1],
                [1, 'SN/CN',                   'sn_cn',                  'teks',    1],
                [1, 'Kode Dokter Bedah',       'kode_dokter_bedah',      'teks',    1],
                [1, 'Kode Dokter Anestesi',    'kode_dokter_anestesi',   'teks',    1],
                [1, 'Tindakan',                'tindakan',               'teks',    1],
                [1, 'Nama Tindakan Sesuai',    'is_nama_tindakan_sesuai','status',  1],
                [1, 'Kasa Lengkap',            'is_kasa_lengkap',        'status',  1],
                [1, 'Instrumen Lengkap',       'is_instrumen_lengkap',   'status',  1],
                [1, 'Alat Tajam Lengkap',      'is_alat_tajam_lengkap',  'status',  1],
                [1, 'Label Spesimen',          'id_label_spesimen',      'indeks',  1],
                [1, 'Formulir Spesimen',       'id_formulir_spesimen',   'indeks',  1],
                [1, 'Konfirmasi Bedah',        'is_konfirmasi_bedah',    'status',  1],
                [1, 'Konfirmasi Anestesi',     'is_konfirmasi_anestesi', 'status',  1],
                [1, 'Konfirmasi Perawat',      'is_konfirmasi_perawat',  'status',  1],
                [1, 'Catatan Pemulihan',       'catatan_pemulihan',      'teks',    1],
                [1, 'ID Perawat OK',           'id_perawat_ok',          'teks',    1],
            ],
        );
    }
}