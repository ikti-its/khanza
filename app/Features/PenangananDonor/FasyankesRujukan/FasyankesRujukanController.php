<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;
use App\Core\Controller\ControllerTemplate;

class FasyankesRujukanController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new FasyankesRujukanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Fasyankes Rujukan', 'icon' => 'fasyankes_rujukan'],
            ],
            judul: 'Fasyankes Rujukan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Fasyankes', 'id_fasyankes', 'indeks', 0],
                [1, 'Nama Fasyankes', 'nama_fasyankes', 'teks', 1],
                [1, 'ID Alamat', 'id_alamat', 'indeks', 1],
                [1, 'Kode Pos', 'kode_pos', 'teks', 1],
            ],
        );
    }   
}