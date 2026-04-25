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
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Transportasi', 'id_transportasi', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Transportasi', 'nama_transportasi', I::TEXT, REQUIRED],
            ],
        );
    }   
}