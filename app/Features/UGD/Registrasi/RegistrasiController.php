<?php
declare(strict_types=1);

namespace App\Features\UGD\Registrasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RegistrasiController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new RegistrasiModel(),
            [
                ['UGD', 'ugd'],
                ['Registrasi', 'registrasi'],
            ],
            'Registrasi',
            [
                A::READ,
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [SHOW, REQUIRED, I::INDEX, 'nomor_reg', 'No. Registrasi'],
                [HIDE, REQUIRED, I::INDEX, 'nomor_rawat', 'Nomor Rawat'],
                [HIDE, REQUIRED, I::DATE, 'tanggal', 'Tanggal'],
                [HIDE, REQUIRED, I::TIME, 'jam', 'Jam'],
                [SHOW, REQUIRED, I::INDEX, 'nomor_rm', 'No. Rekam Medis'],
                [SHOW, REQUIRED, I::NAME, 'nama_pasien', 'Nama'],
                [HIDE, REQUIRED, I::SELECT, 'jenis_kelamin', 'Jenis Kelamin'],
                [SHOW, REQUIRED, I::SELECT, 'poliklinik', 'Poliklinik'],
                [SHOW, REQUIRED, I::NAME, 'dokter_dituju', 'Dokter'],
                [HIDE, REQUIRED, I::NAME, 'penanggung_jawab', 'Penanggung Jawab'],
                [HIDE, REQUIRED, I::SELECT, 'hubungan_pj', 'Hubungan Penanggung Jawab'],
                [HIDE, REQUIRED, I::TEXT, 'alamat_pj', 'Alamat Penanggung Jawab'],
                [HIDE, REQUIRED, I::MONEY, 'biaya_registrasi', 'Biaya Registrasi'],
                [HIDE, REQUIRED, I::SELECT, 'status_rawat', 'Status Rawat'],
                [HIDE, REQUIRED, I::SELECT, 'jenis_bayar', 'Jenis Bayar'],
                [HIDE, REQUIRED, I::SELECT, 'status_bayar', 'Status Bayar'],
            ],
        );
    }   
}