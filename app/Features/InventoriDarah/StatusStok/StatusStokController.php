<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusStok;
use App\Core\Controller\ControllerTemplate;

class StatusStokController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new StatusStokModel(),
            breadcrumbs: [
                ['title' => 'Inventaris Darah', 'icon' => 'inventaris_darah'],
                ['title' => 'Status Stok', 'icon' => 'status_stok'],
            ],
            judul: 'Status Stok',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Status Stok', 'id_status_stok', 'indeks', 0],
                [1, 'Nama Status Stok', 'nama_status_stok', 'teks', 1],
            ],
        );
    }   
}