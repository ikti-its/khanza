<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\CaraMasuk;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class CaraMasukController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new CaraMasukModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Cara Masuk', 'icon' => 'cara_masuk'],
            ],
            judul: 'Cara Masuk',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_cara', 'ID Cara'],
                [SHOW, REQUIRED, I::TEXT, 'nama_cara', 'Nama Cara'],
            ],
        );
    }   
}