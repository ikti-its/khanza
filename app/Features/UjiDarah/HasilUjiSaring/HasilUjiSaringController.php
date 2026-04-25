<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;
use App\Core\Controller\ControllerTemplate;

final class HasilUjiSaringController extends ControllerTemplate
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
                [HIDE, 'ID Uji Saring', 'id_uji_saring', 'indeks', OPTIONAL],
                [SHOW, 'ID Bag', 'id_bag', 'indeks', REQUIRED],
                [SHOW, 'ID Metode Uji', 'id_metode_uji', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Uji', 'tanggal_uji', 'tanggal', REQUIRED],
                [SHOW, 'ID Petugas', 'id_petugas', 'indeks', REQUIRED],
            ],
        );
    }   
}