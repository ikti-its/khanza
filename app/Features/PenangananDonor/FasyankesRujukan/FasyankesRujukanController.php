<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;
use App\Core\Controller\ControllerTemplate;

final class FasyankesRujukanController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Fasyankes', 'id_fasyankes', 'indeks', OPTIONAL],
                [SHOW, 'Nama Fasyankes', 'nama_fasyankes', 'teks', REQUIRED],
                [SHOW, 'ID Alamat', 'id_alamat', 'indeks', REQUIRED],
                [SHOW, 'Kode Pos', 'kode_pos', 'teks', REQUIRED],
            ],
        );
    }   
}