<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PertanyaanKonseling;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PertanyaanKonselingController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Pertanyaan', 'id_pertanyaan', 'indeks', OPTIONAL],
                [SHOW, 'Teks Pertanyaan', 'teks_pertanyaan', 'teks', REQUIRED],
            ],
        );
    }   
}