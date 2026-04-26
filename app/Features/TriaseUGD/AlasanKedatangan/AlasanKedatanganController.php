<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlasanKedatangan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class AlasanKedatanganController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new AlasanKedatanganModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Alasan Kedatangan', 'icon' => 'alasan_kedatangan'],
            ],
            title: 'Alasan Kedatangan',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_alasan', 'ID Alasan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_alasan', 'Nama Alasan Kedatangan'],
            ],
        );
    }   
}