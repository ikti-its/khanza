<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\KantongDarah;
use App\Core\Controller\ControllerTemplate;

final class KantongDarahController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new KantongDarahModel(),
            breadcrumbs: [
                ['title' => 'Inventaris Darah', 'icon' => 'inventaris_darah'],
                ['title' => 'Kantong Darah', 'icon' => 'kantong_darah'],
            ],
            judul: 'Kantong Darah',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Bag', 'id_bag', 'indeks', 0],
                [1, 'ID Pengambilan Darah', 'id_pengambilan_darah', 'indeks', 1],
                [1, 'Nomor Bag', 'no_bag', 'teks', 1],
                [1, 'ID Jenis Bag', 'id_jenis_bag', 'indeks', 1],
            ],
        );
    }   
}