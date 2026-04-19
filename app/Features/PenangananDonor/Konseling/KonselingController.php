<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Konseling;
use App\Core\Controller\ControllerTemplate;

class KonselingController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new KonselingModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Konseling', 'icon' => 'konseling'],
            ],
            judul: 'Konseling',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Konseling', 'id_konseling', 'indeks', 0],
                [1, 'ID Kasus', 'id_kasus', 'indeks', 1],
                [1, 'Tanggal Konseling', 'tanggal_konseling', 'tanggal', 1],
                [1, 'ID Petugas', 'id_petugas', 'indeks', 1],
            ],
        );
    }   
}