<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaringDetail;
use App\Core\Controller\ControllerTemplate;

class HasilUjiSaringDetailController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new HasilUjiSaringDetailModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Hasil Uji Saring Detail', 'icon' => 'hasil_uji_saring_detail'],
            ],
            judul: 'Hasil Uji Saring Detail',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Uji Saring Detail', 'id_uji_saring_detail', 'indeks', 0],
                [1, 'ID Uji Saring', 'id_uji_saring', 'indeks', 1],
                [1, 'ID Parameter Uji', 'id_parameter_uji', 'indeks', 1],
                [1, 'ID Nilai Saring', 'id_nilai_saring', 'indeks', 1],
                [1, 'Nilai Absorbance', 'nilai_absorbance', 'desimal', 0],
            ],
        );
    }   
}