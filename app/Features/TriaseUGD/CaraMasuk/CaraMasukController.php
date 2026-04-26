<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\CaraMasuk;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class CaraMasukController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new CaraMasukModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Cara Masuk', 'icon' => 'cara_masuk'],
            ],
            title: 'Cara Masuk',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_cara', 'ID Cara'],
                [SHOW, REQUIRED, I::TEXT, 'nama_cara', 'Nama Cara'],
            ],
        );
    }   
}