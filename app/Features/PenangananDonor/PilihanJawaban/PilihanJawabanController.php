<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;
use App\Core\Controller\ControllerTemplate;

class PilihanJawabanController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PilihanJawabanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Pilihan Jawaban', 'icon' => 'pilihan_jawaban'],
            ],
            judul: 'Pilihan Jawaban',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Pilihan', 'id_pilihan', 'indeks', 0],
                [1, 'Nama Pilihan', 'nama_pilihan', 'teks', 1],
            ],
        );
    }   
}