<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaringDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilUjiSaringDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new HasilUjiSaringDetailModel(),
            breadcrumbs: [
                ['title' => 'Uji Darah', 'icon' => 'uji_darah'],
                ['title' => 'Hasil Uji Saring Detail', 'icon' => 'hasil_uji_saring_detail'],
            ],
            title: 'Hasil Uji Saring Detail',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_uji_saring_detail', 'ID Uji Saring Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_uji_saring', 'ID Uji Saring'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_uji', 'ID Parameter Uji'],
                [SHOW, REQUIRED, I::INDEX, 'id_nilai_saring', 'ID Nilai Saring'],
                [SHOW, OPTIONAL, I::FLOAT, 'nilai_absorbance', 'Nilai Absorbance'],
            ],
        );
    }   
}