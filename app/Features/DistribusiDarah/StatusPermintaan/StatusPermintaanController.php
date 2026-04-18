<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPermintaan;
use App\Core\Controller\ControllerTemplate;

class StatusPermintaanController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new StatusPermintaanModel(),
            breadcrumbs: [
                ['title' => 'Pelayanan Darah', 'icon' => 'pelayanan_darah'],
                ['title' => 'Status Permintaan', 'icon' => 'status_permintaan'],
            ],
            judul: 'Status Permintaan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Status Permintaan', 'id_status_permintaan', 'indeks', 0],
                [1, 'Nama Status Permintaan', 'nama_status_permintaan', 'teks', 1],
            ],
        );
    }   
}