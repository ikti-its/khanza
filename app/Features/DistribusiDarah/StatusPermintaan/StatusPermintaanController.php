<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPermintaan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StatusPermintaanController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Status Permintaan', 'id_status_permintaan', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Status Permintaan', 'nama_status_permintaan', I::TEXT, REQUIRED],
            ],
        );
    }   
}