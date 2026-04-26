<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriase;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class DataTriaseController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new DataTriaseModel(),
            [
                ['Triase UGD', 'triase_ugd'],
                ['Data Triase', 'data_triase'],
            ],
            'Data Triase',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_triase', 'ID Triase'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_kunjungan', 'Tanggal Kunjungan'],
                [HIDE, REQUIRED, I::INDEX, 'id_cara_masuk', 'ID Cara Masuk'],
                [HIDE, REQUIRED, I::INDEX, 'id_alat_transportasi', 'ID Alat Transportasi'],
                [HIDE, REQUIRED, I::INDEX, 'id_alasan_kedatangan', 'ID Alasan Kedatangan'],
                [HIDE, REQUIRED, I::TEXT, 'keterangan_kedatangan', 'Keterangan Kedatangan'],
                [SHOW, REQUIRED, I::INDEX, 'id_macam_kasus', 'ID Macam Kasus'],
                [SHOW, REQUIRED, I::NUMBER, 'sistolik', 'Tekanan Sistolik'],
                [SHOW, REQUIRED, I::NUMBER, 'diastolik', 'Tekanan Diastolik'],
                [SHOW, REQUIRED, I::NUMBER, 'nadi', 'Nadi (x/menit)'],
                [HIDE, REQUIRED, I::NUMBER, 'pernapasan', 'Pernapasan (x/menit)'],
                [SHOW, REQUIRED, I::TEMP, 'suhu', 'Suhu'],
                [SHOW, REQUIRED, I::NUMBER, 'saturasi_o2', 'Saturasi O2 (%)'],
                [HIDE, REQUIRED, I::NUMBER, 'nyeri', 'Nyeri (0-10)'],
            ],
        );
    }   
}