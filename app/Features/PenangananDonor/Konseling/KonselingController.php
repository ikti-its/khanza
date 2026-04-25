<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Konseling;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class KonselingController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Konseling', 'id_konseling', 'indeks', OPTIONAL],
                [SHOW, 'ID Kasus', 'id_kasus', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Konseling', 'tanggal_konseling', 'tanggal', REQUIRED],
                [SHOW, 'ID Petugas', 'id_petugas', 'indeks', REQUIRED],
            ],
        );
    }   
}