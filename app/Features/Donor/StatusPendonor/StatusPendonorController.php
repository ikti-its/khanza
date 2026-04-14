<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPendonor;
use App\Core\Controller\ControllerTemplate;

class StatusPendonorController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Status Pendonor', 'id_status_pendonor', 'indeks', 0],
                [1, 'Nama Status Pendonor', 'nama_status_pendonor', 'teks', 1],
            ],
        );
    }   
}