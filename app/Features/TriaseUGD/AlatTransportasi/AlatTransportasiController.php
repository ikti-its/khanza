<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlatTransportasi;
use App\Core\Controller\ControllerTemplate;

class AlatTransportasiController extends ControllerTemplate
{
    public function __construct(
    ){
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
                [0, 'ID Transportasi', 'id_transportasi', 'indeks', 0],
                [1, 'Nama Transportasi', 'nama_transportasi', 'teks', 1],
            ],
        );
    }   
}