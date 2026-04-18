<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;
use App\Core\Controller\ControllerTemplate;

class HasilDiagnostikDetailController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new HasilDiagnostikDetailModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Hasil Diagnostik Detail', 'icon' => 'hasil_diagnostik_detail'],
            ],
            judul: 'Hasil Diagnostik Detail',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Diagnostik Detail', 'id_diagnostik_detail', 'indeks', 0],
                [1, 'ID Diagnostik', 'id_diagnostik', 'indeks', 1],
                [1, 'ID Parameter Uji', 'id_parameter_uji', 'indeks', 1],
                [1, 'ID Nilai Diagnostik', 'id_nilai_diagnostik', 'indeks', 1],
            ],
        );
    }   
}