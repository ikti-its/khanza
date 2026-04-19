<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JenisPencekalan;
use App\Core\Controller\ControllerTemplate;

class JenisPencekalanController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new JenisPencekalanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Jenis Pencekalan', 'icon' => 'jenis_pencekalan'],
            ],
            judul: 'Jenis Pencekalan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Jenis Pencekalan', 'id_jenis_pencekalan', 'indeks', 0],
                [1, 'Nama Jenis Pencekalan', 'nama_jenis_pencekalan', 'teks', 1],
            ],
        );
    }   
}