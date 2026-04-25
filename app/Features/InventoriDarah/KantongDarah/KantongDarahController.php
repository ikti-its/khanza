<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\KantongDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class KantongDarahController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Bag', 'id_bag', I::INDEX, OPTIONAL],
                [SHOW, 'ID Pengambilan Darah', 'id_pengambilan_darah', I::INDEX, REQUIRED],
                [SHOW, 'Nomor Bag', 'no_bag', I::TEXT, REQUIRED],
                [SHOW, 'ID Jenis Bag', 'id_jenis_bag', I::INDEX, REQUIRED],
            ],
        );
    }   
}