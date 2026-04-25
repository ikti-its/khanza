<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;
use App\Core\Controller\ControllerTemplate;

final class PengambilanDarahController extends ControllerTemplate
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
                [HIDE, 'ID Pengambilan Darah', 'id_pengambilan_darah', 'indeks', OPTIONAL],
                [SHOW, 'Nomor Pengambilan', 'nomor_pengambilan', 'teks', REQUIRED],
                [SHOW, 'ID Kunjungan', 'id_kunjungan', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Pengambilan', 'tanggal_pengambilan', 'tanggal', REQUIRED],
                [SHOW, 'ID Shift', 'id_shift', 'indeks', REQUIRED],
                [HIDE, 'ID Jenis Donor', 'id_jenis_donor', 'indeks', REQUIRED],
                [SHOW, 'ID Lokasi Pengambilan', 'id_lokasi_pengambilan', 'indeks', REQUIRED],
                [HIDE, 'ID Petugas', 'id_petugas', 'indeks', REQUIRED],
            ],
        );
    }   
}