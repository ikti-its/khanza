<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusKunjungan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StatusKunjunganController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusKunjunganModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Status Kunjungan', 'icon' => 'status_kunjungan'],
            ],
            title: 'Status Kunjungan',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_kunjungan', 'ID Status Kunjungan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_kunjungan', 'Nama Status Kunjungan'],
            ],
        );
    }   
}