<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaringDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class HasilUjiSaringDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new HasilUjiSaringDetailModel(),
            breadcrumbs: [
                ['Uji Darah', 'uji_darah'],
                ['Hasil Uji Saring Detail', 'hasil_uji_saring_detail'],
            ],
            title: 'Hasil Uji Saring Detail',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
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