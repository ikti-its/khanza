<?php
declare(strict_types=1);

namespace App\Features\Operasi\SignoutSebelumTutupLuka;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Sign Out',            'id_signout',             I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',        'nomor_reg',              I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Sign Out',          'waktu_signout',          I::DATE, REQUIRED],
                [SHOW, 'SN/CN',                   'sn_cn',                  I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',       'kode_dokter_bedah',      I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Anestesi',    'kode_dokter_anestesi',   I::TEXT,    REQUIRED],
                [SHOW, 'Tindakan',                'tindakan',               I::TEXT,    REQUIRED],
                [SHOW, 'Nama Tindakan Sesuai',    'is_nama_tindakan_sesuai',I::SELECT,  REQUIRED],
                [SHOW, 'Kasa Lengkap',            'is_kasa_lengkap',        I::SELECT,  REQUIRED],
                [SHOW, 'Instrumen Lengkap',       'is_instrumen_lengkap',   I::SELECT,  REQUIRED],
                [SHOW, 'Alat Tajam Lengkap',      'is_alat_tajam_lengkap',  I::SELECT,  REQUIRED],
                [SHOW, 'Label Spesimen',          'id_label_spesimen',      I::INDEX,  REQUIRED],
                [SHOW, 'Formulir Spesimen',       'id_formulir_spesimen',   I::INDEX,  REQUIRED],
                [SHOW, 'Konfirmasi Bedah',        'is_konfirmasi_bedah',    I::SELECT,  REQUIRED],
                [SHOW, 'Konfirmasi Anestesi',     'is_konfirmasi_anestesi', I::SELECT,  REQUIRED],
                [SHOW, 'Konfirmasi Perawat',      'is_konfirmasi_perawat',  I::SELECT,  REQUIRED],
                [SHOW, 'Catatan Pemulihan',       'catatan_pemulihan',      I::TEXT,    REQUIRED],
                [SHOW, 'ID Perawat OK',           'id_perawat_ok',          I::TEXT,    REQUIRED],
            ],
        );
    }
}