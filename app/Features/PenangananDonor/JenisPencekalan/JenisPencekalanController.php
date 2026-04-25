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
            judul: 'Jenis Pencekalan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Jenis Pencekalan', 'id_jenis_pencekalan', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Jenis Pencekalan', 'nama_jenis_pencekalan', I::TEXT, REQUIRED],
            ],
        );
    }   
}