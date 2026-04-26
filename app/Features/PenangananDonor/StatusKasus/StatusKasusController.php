<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusKasus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StatusKasusController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusKasusModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Status Kasus', 'icon' => 'status_kasus'],
            ],
            title: 'Status Kasus',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_kasus', 'ID Status Kasus'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_kasus', 'Nama Status Kasus'],
            ],
        );
    }   
}