<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\JenisBag;
use App\Core\Controller\ControllerTemplate;

final class JenisBagController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new JenisBagModel(),
            breadcrumbs: [
                ['title' => 'Inventaris Darah', 'icon' => 'inventaris_darah'],
                ['title' => 'Jenis Bag', 'icon' => 'jenis_bag'],
            ],
            judul: 'Jenis Bag',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Jenis Bag', 'id_jenis_bag', 'indeks', OPTIONAL],
                [SHOW, 'Kode', 'kode_jenis_bag', 'teks', REQUIRED],
                [SHOW, 'Nama Jenis Bag', 'nama_jenis_bag', 'teks', REQUIRED],
            ],
        );
    }   
}