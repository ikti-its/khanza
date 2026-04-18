<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPembayaran;
use App\Core\Controller\ControllerTemplate;

class StatusPembayaranController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new StatusPembayaranModel(),
            breadcrumbs: [
                ['title' => 'Pelayanan Darah', 'icon' => 'pelayanan_darah'],
                ['title' => 'Status Pembayaran', 'icon' => 'status_pembayaran'],
            ],
            judul: 'Status Pembayaran',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Status Pembayaran', 'id_status_pembayaran', 'indeks', 0],
                [1, 'Nama Status Pembayaran', 'nama_status_pembayaran', 'teks', 1],
            ],
        );
    }   
}