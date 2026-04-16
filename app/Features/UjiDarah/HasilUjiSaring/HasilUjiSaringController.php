<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;
use App\Core\Controller\ControllerTemplate;

class HasilUjiSaringController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new HasilUjiSaringModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Hasil Uji Saring', 'icon' => 'hasil_uji_saring'],
            ],
            judul: 'Hasil Uji Saring',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Uji Saring', 'id_uji_saring', 'indeks', 0],
                [1, 'ID Bag', 'id_bag', 'indeks', 1],
                [1, 'ID Metode Uji', 'id_metode_uji', 'indeks', 1],
                [1, 'Tanggal Uji', 'tanggal_uji', 'tanggal', 1],
                [1, 'ID Petugas', 'id_petugas', 'indeks', 1],
            ],
        );
    }   
}