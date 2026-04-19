<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Rujukan;
use App\Core\Controller\ControllerTemplate;

class RujukanController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new RujukanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Rujukan', 'icon' => 'rujukan'],
            ],
            judul: 'Rujukan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Rujukan', 'id_rujukan', 'indeks', 0],
                [1, 'ID Kasus', 'id_kasus', 'indeks', 1],
                [1, 'Nomor Surat', 'nomor_surat', 'teks', 1],
                [1, 'Tanggal Rujukan', 'tanggal_rujukan', 'tanggal', 1],
                [1, 'ID Fasyankes Tujuan', 'id_fasyankes', 'indeks', 1],
            ],
        );
    }   
}