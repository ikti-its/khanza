<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPendonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StatusPendonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusPendonorModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Status Pendonor', 'icon' => 'status_pendonor'],
            ],
            judul: 'Status Pendonor',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Status Pendonor', 'id_status_pendonor', 'indeks', OPTIONAL],
                [SHOW, 'Nama Status Pendonor', 'nama_status_pendonor', 'teks', REQUIRED],
            ],
        );
    }   
}