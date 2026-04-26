<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, OPTIONAL, I::INDEX, 'id_diagnostik_detail', 'ID Diagnostik Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_diagnostik', 'ID Diagnostik'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_uji', 'ID Parameter Uji'],
                [SHOW, REQUIRED, I::INDEX, 'id_nilai_diagnostik', 'ID Nilai Diagnostik'],
            ],
        );
    }   
}