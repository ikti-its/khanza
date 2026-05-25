<?php
declare(strict_types=1);

namespace App\Features\RawatInap\Registrasi;

use App\Core\Controller\ActionType as A;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RegistrasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RegistrasiModel(),
            [
                ['Rawat Inap', 'rawat_inap'],
                ['Registrasi', 'registrasi'],
            ],
            'Rawat Inap',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, REQUIRED, I::INDEX,  'id_rawat_inap',    'ID Rawat Inap'],
                [SHOW, REQUIRED, I::INDEX,  'nomor_rawat',      'Nomor Rawat'],
                [HIDE, REQUIRED, I::INDEX,  'nomor_rm',         'Nomor Rekam Medis'],
                [SHOW, REQUIRED, I::NAME,   'nama_pasien',      'Nama Pasien'],
                [HIDE, REQUIRED, I::TEXT,   'alamat_pasien',    'Alamat Pasien'],
                [HIDE, REQUIRED, I::NAME,   'penanggung_jawab', 'Penanggung Jawab'],
                [HIDE, REQUIRED, I::TEXT,   'hubungan_pj',      'Hubungan Penanggung Jawab'],
                [HIDE, REQUIRED, I::SELECT, 'jenis_bayar',      'Jenis Bayar'],
                [HIDE, REQUIRED, I::TEXT,   'kamar',            'Kamar'],
                [HIDE, REQUIRED, I::MONEY,  'tarif_kamar',      'Tarif Kamar'],
                [SHOW, REQUIRED, I::TEXT,   'diagnosa_awal',    'Diagnosa Awal'],
                [HIDE, OPTIONAL, I::TEXT,   'diagnosa_akhir',   'Diagnosa Akhir'],
                [HIDE, REQUIRED, I::DATE,   'tanggal_masuk',    'Tanggal Masuk'],
                [HIDE, REQUIRED, I::TIME,   'jam_masuk',        'Jam Masuk'],
                [HIDE, OPTIONAL, I::DATE,   'tanggal_keluar',   'Tanggal Keluar'],
                [HIDE, OPTIONAL, I::TIME,   'jam_keluar',       'Jam Keluar'],
                [HIDE, REQUIRED, I::MONEY,  'total_biaya',      'Total Biaya'],
                [HIDE, OPTIONAL, I::SELECT, 'status_pulang',    'Status Pulang'],
                [HIDE, REQUIRED, I::NUMBER, 'lama_ranap',       'Lama'],
                [SHOW, REQUIRED, I::NAME,   'dokter_pj',        'Dokter'],
                [HIDE, OPTIONAL, I::SELECT, 'status_bayar',     'Status Bayar'],
            ],
        );
    }
}
