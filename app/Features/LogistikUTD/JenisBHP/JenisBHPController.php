<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\JenisBHP;
use App\Core\Controller\ControllerTemplate;

class JenisBHPController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new JenisBHPModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Jenis BHP', 'icon' => 'jenis_bhp'],
            ],
            judul: 'Jenis BHP',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Jenis BHP', 'id_jenis_bhp', 'indeks', 0],
                [1, 'Nama Jenis BHP', 'nama_jenis_bhp', 'teks', 1],
            ],
        );
    }   
}