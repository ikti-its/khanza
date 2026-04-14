<?php
declare(strict_types=1);

namespace App\Features\Donor\JenisDonor;
use App\Core\Controller\ControllerTemplate;

class JenisDonorController extends ControllerTemplate
{
    public function __construct(
    ){
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
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Jenis Donor', 'id_jenis_donor', 'indeks', 0],
                [1, 'Kode', 'kode_jenis_donor', 'teks', 1],
                [1, 'Nama Jenis Donor', 'nama_jenis_donor', 'teks', 1],
            ],
        );
    }   
}