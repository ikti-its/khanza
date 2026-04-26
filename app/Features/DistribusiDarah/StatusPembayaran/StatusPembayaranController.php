<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPembayaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StatusPembayaranController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, OPTIONAL, I::INDEX, 'id_status_pembayaran', 'ID Status Pembayaran'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_pembayaran', 'Nama Status Pembayaran'],
            ],
        );
    }   
}