<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JawabanKonseling;
use App\Core\Controller\ControllerTemplate;

final class JawabanKonselingController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new JawabanKonselingModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Jawaban Konseling', 'icon' => 'jawaban_konseling'],
            ],
            judul: 'Jawaban Konseling',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Jawaban', 'id_jawaban', 'indeks', OPTIONAL],
                [SHOW, 'ID Konseling', 'id_konseling', 'indeks', REQUIRED],
                [SHOW, 'ID Pertanyaan', 'id_pertanyaan', 'indeks', REQUIRED],
                [SHOW, 'ID Pilihan Jawaban', 'id_pilihan', 'indeks', REQUIRED],
            ],
        );
    }   
}