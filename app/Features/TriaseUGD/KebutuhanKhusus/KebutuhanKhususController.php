<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\KebutuhanKhusus;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class KebutuhanKhususController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new KebutuhanKhususModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Kebutuhan Khusus', 'icon' => 'kebutuhan_khusus'],
            ],
            title: 'Kebutuhan Khusus',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kebutuhan', 'ID Kebutuhan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kebutuhan', 'Nama Kebutuhan'],
            ],
        );
    }   
}