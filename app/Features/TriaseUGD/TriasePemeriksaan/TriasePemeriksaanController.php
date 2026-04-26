<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\TriasePemeriksaan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class TriasePemeriksaanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new TriasePemeriksaanModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Triase Pemeriksaan', 'icon' => 'triase_pemeriksaan'],
            ],
            judul: 'Triase Pemeriksaan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pemeriksaan', 'ID Pemeriksaan'],
                [SHOW, REQUIRED, I::TEXT, 'kode_pemeriksaan', 'Kode'],
                [SHOW, REQUIRED, I::TEXT, 'nama_pemeriksaan', 'Nama Pemeriksaan'],
            ],
        );
    }   
}