<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlatTransportasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class AlatTransportasiController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new AlatTransportasiModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Alat Transportasi', 'icon' => 'alat_transportasi'],
            ],
            judul: 'Alat Transportasi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_transportasi', 'ID Transportasi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_transportasi', 'Nama Transportasi'],
            ],
        );
    }   
}