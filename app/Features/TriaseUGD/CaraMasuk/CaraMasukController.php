<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\CaraMasuk;
use App\Core\Controller\ControllerTemplate;

class CaraMasukController extends ControllerTemplate
{
    public function __construct(
    ){
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
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Cara', 'id_cara', 'indeks', 0],
                [1, 'Nama Cara', 'nama_cara', 'teks', 1],
            ],
        );
    }   
}