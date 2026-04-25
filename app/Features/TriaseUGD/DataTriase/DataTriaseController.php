<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriase;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class DataTriaseController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new DataTriaseModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Data Triase', 'icon' => 'data_triase'],
            ],
            judul: 'Data Triase',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Triase', 'id_triase', I::INDEX, OPTIONAL],
                [SHOW, 'Nomor Registrasi', 'nomor_reg', I::TEXT, REQUIRED],
                [SHOW, 'Tanggal Kunjungan', 'tanggal_kunjungan', 'tanggal_jam', REQUIRED],
                [HIDE, 'ID Cara Masuk', 'id_cara_masuk', I::INDEX, REQUIRED],
                [HIDE, 'ID Alat Transportasi', 'id_alat_transportasi', I::INDEX, REQUIRED],
                [HIDE, 'ID Alasan Kedatangan', 'id_alasan_kedatangan', I::INDEX, REQUIRED],
                [HIDE, 'Keterangan Kedatangan', 'keterangan_kedatangan', I::TEXT, REQUIRED],
                [SHOW, 'ID Macam Kasus', 'id_macam_kasus', I::INDEX, REQUIRED],
                [SHOW, 'Tekanan Sistolik', 'sistolik', I::NUMBER, REQUIRED],
                [SHOW, 'Tekanan Diastolik', 'diastolik', I::NUMBER, REQUIRED],
                [SHOW, 'Nadi (x/menit)', 'nadi', I::NUMBER, REQUIRED],
                [HIDE, 'Pernapasan (x/menit)', 'pernapasan', I::NUMBER, REQUIRED],
                [SHOW, 'Suhu', 'suhu', 'suhu', REQUIRED],
                [SHOW, 'Saturasi O2 (%)', 'saturasi_o2', I::NUMBER, REQUIRED],
                [HIDE, 'Nyeri (0-10)', 'nyeri', I::NUMBER, REQUIRED],
            ],
        );
    }   
}