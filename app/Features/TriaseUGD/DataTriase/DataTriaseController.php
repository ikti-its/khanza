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
                [HIDE, 'ID Triase', 'id_triase', 'indeks', OPTIONAL],
                [SHOW, 'Nomor Registrasi', 'nomor_reg', 'teks', REQUIRED],
                [SHOW, 'Tanggal Kunjungan', 'tanggal_kunjungan', 'tanggal_jam', REQUIRED],
                [HIDE, 'ID Cara Masuk', 'id_cara_masuk', 'indeks', REQUIRED],
                [HIDE, 'ID Alat Transportasi', 'id_alat_transportasi', 'indeks', REQUIRED],
                [HIDE, 'ID Alasan Kedatangan', 'id_alasan_kedatangan', 'indeks', REQUIRED],
                [HIDE, 'Keterangan Kedatangan', 'keterangan_kedatangan', 'teks', REQUIRED],
                [SHOW, 'ID Macam Kasus', 'id_macam_kasus', 'indeks', REQUIRED],
                [SHOW, 'Tekanan Sistolik', 'sistolik', 'jumlah', REQUIRED],
                [SHOW, 'Tekanan Diastolik', 'diastolik', 'jumlah', REQUIRED],
                [SHOW, 'Nadi (x/menit)', 'nadi', 'jumlah', REQUIRED],
                [HIDE, 'Pernapasan (x/menit)', 'pernapasan', 'jumlah', REQUIRED],
                [SHOW, 'Suhu', 'suhu', 'suhu', REQUIRED],
                [SHOW, 'Saturasi O2 (%)', 'saturasi_o2', 'jumlah', REQUIRED],
                [HIDE, 'Nyeri (0-10)', 'nyeri', 'jumlah', REQUIRED],
            ],
        );
    }   
}