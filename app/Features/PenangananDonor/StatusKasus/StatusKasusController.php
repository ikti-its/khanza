<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusKasus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StatusKasusController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusKasusModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Status Kasus', 'icon' => 'status_kasus'],
            ],
            judul: 'Status Kasus',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Status Kasus', 'id_status_kasus', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Status Kasus', 'nama_status_kasus', I::TEXT, REQUIRED],
            ],
        );
    }   
}