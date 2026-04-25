<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\KebutuhanKhusus;
use App\Core\Controller\ControllerTemplate;

final class KebutuhanKhususController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new KebutuhanKhususModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Kebutuhan Khusus', 'icon' => 'kebutuhan_khusus'],
            ],
            judul: 'Kebutuhan Khusus',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Kebutuhan', 'id_kebutuhan', 'indeks', 0],
                [1, 'Nama Kebutuhan', 'nama_kebutuhan', 'teks', 1],
            ],
        );
    }   
}