<?php
declare(strict_types=1);

namespace App\Features\Donor\JenisDonor;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class JenisDonorController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new JenisDonorModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Jenis Donor', 'icon' => 'jenis_donor'],
            ],
            judul: 'Jenis Donor',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_donor', 'ID Jenis Donor'],
                [SHOW, REQUIRED, I::TEXT, 'kode_jenis_donor', 'Kode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis_donor', 'Nama Jenis Donor'],
            ],
        );
    }   
}