<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;
use App\Core\Controller\ControllerTemplate;

final class HasilDiagnostikDetailController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Diagnostik Detail', 'id_diagnostik_detail', 'indeks', OPTIONAL],
                [SHOW, 'ID Diagnostik', 'id_diagnostik', 'indeks', REQUIRED],
                [SHOW, 'ID Parameter Uji', 'id_parameter_uji', 'indeks', REQUIRED],
                [SHOW, 'ID Nilai Diagnostik', 'id_nilai_diagnostik', 'indeks', REQUIRED],
            ],
        );
    }   
}