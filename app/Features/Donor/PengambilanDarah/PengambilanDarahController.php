<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;
use App\Core\Controller\ControllerTemplate;

class PengambilanDarahController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PengambilanDarahModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Pengambilan Darah', 'icon' => 'pengambilan_darah'],
            ],
            judul: 'Pengambilan Darah',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Pengambilan Darah', 'id_pengambilan_darah', 'indeks', 0],
                [1, 'Nomor Pengambilan', 'nomor_pengambilan', 'teks', 1],
                [1, 'ID Kunjungan', 'id_kunjungan', 'indeks', 1],
                [1, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal', 1],
                [1, 'ID Shift', 'id_shift', 'indeks', 1],
                [0, 'ID Jenis Donor', 'id_jenis_donor', 'indeks', 1],
                [1, 'ID Lokasi Pengambilan', 'id_lokasi_pengambilan', 'indeks', 1],
                [0, 'ID Petugas', 'id_petugas', 'indeks', 1],
            ],
        );
    }   
}