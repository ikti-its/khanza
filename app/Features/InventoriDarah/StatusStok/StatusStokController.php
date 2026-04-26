<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusStok;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StatusStokController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, OPTIONAL, I::INDEX, 'id_status_stok', 'ID Status Stok'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_stok', 'Nama Status Stok'],
            ],
        );
    }   
}