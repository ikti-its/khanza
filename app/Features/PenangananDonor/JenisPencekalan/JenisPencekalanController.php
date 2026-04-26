<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JenisPencekalan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class JenisPencekalanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new JenisPencekalanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Jenis Pencekalan', 'icon' => 'jenis_pencekalan'],
            ],
            title: 'Jenis Pencekalan',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_pencekalan', 'ID Jenis Pencekalan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis_pencekalan', 'Nama Jenis Pencekalan'],
            ],
        );
    }   
}