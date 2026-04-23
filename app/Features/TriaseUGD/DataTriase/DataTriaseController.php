<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriase;
use App\Core\Controller\ControllerTemplate;

class DataTriaseController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Triase', 'id_triase', 'indeks', 0],
                [1, 'Nomor Registrasi', 'nomor_reg', 'teks', 1],
                [1, 'Tanggal Kunjungan', 'tanggal_kunjungan', 'tanggal_jam', 1],
                [0, 'ID Cara Masuk', 'id_cara_masuk', 'indeks', 1],
                [0, 'ID Alat Transportasi', 'id_alat_transportasi', 'indeks', 1],
                [0, 'ID Alasan Kedatangan', 'id_alasan_kedatangan', 'indeks', 1],
                [0, 'Keterangan Kedatangan', 'keterangan_kedatangan', 'teks', 1],
                [1, 'ID Macam Kasus', 'id_macam_kasus', 'indeks', 1],
                [1, 'Tekanan Sistolik', 'sistolik', 'jumlah', 1],
                [1, 'Tekanan Diastolik', 'diastolik', 'jumlah', 1],
                [1, 'Nadi (x/menit)', 'nadi', 'jumlah', 1],
                [0, 'Pernapasan (x/menit)', 'pernapasan', 'jumlah', 1],
                [1, 'Suhu', 'suhu', 'suhu', 1],
                [1, 'Saturasi O2 (%)', 'saturasi_o2', 'jumlah', 1],
                [0, 'Nyeri (0-10)', 'nyeri', 'jumlah', 1],
            ],
        );
    }   
}