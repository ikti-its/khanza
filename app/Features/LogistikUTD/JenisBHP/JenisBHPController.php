<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\JenisBHP;
use App\Core\Controller\ControllerTemplate;

final class JenisBHPController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Jenis BHP', 'id_jenis_bhp', 'indeks', OPTIONAL],
                [SHOW, 'Nama Jenis BHP', 'nama_jenis_bhp', 'teks', REQUIRED],
            ],
        );
    }   
}