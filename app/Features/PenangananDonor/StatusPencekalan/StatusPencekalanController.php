<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusPencekalan;
use App\Core\Controller\ControllerTemplate;

final class StatusPencekalanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusPencekalanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Status Pencekalan', 'icon' => 'status_pencekalan'],
            ],
            judul: 'Status Pencekalan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Status Pencekalan', 'id_status_pencekalan', 'indeks', OPTIONAL],
                [SHOW, 'Nama Status Pencekalan', 'nama_status_pencekalan', 'teks', REQUIRED],
            ],
        );
    }   
}