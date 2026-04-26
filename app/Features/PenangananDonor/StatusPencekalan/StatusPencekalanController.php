<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusPencekalan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, OPTIONAL, I::INDEX, 'id_status_pencekalan', 'ID Status Pencekalan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_pencekalan', 'Nama Status Pencekalan'],
            ],
        );
    }   
}