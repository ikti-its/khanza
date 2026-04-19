<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PertanyaanKonseling;
use App\Core\Controller\ControllerTemplate;

class PertanyaanKonselingController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new PertanyaanKonselingModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Pertanyaan Konseling', 'icon' => 'pertanyaan_konseling'],
            ],
            judul: 'Pertanyaan Konseling',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Pertanyaan', 'id_pertanyaan', 'indeks', 0],
                [1, 'Teks Pertanyaan', 'teks_pertanyaan', 'teks', 1],
            ],
        );
    }   
}