<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\JenisBHP;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_bhp', 'ID Jenis BHP'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis_bhp', 'Nama Jenis BHP'],
            ],
        );
    }   
}