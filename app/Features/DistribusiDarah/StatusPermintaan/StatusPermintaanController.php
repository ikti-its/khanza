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
            title: 'Status Permintaan',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_permintaan', 'ID Status Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_permintaan', 'Nama Status Permintaan'],
            ],
        );
    }   
}