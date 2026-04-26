<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusPendonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StatusPendonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusPendonorModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Status Pendonor', 'icon' => 'status_pendonor'],
            ],
            title: 'Status Pendonor',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_pendonor', 'ID Status Pendonor'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_pendonor', 'Nama Status Pendonor'],
            ],
        );
    }   
}