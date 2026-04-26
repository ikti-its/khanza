<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class HasilDiagnostikDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new HasilDiagnostikDetailModel(),
            [
                ['Uji Darah', 'uji_darah'],
                ['Hasil Diagnostik Detail', 'hasil_diagnostik_detail'],
            ],
            'Hasil Diagnostik Detail',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_diagnostik_detail', 'ID Diagnostik Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_diagnostik', 'ID Diagnostik'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_uji', 'ID Parameter Uji'],
                [SHOW, REQUIRED, I::INDEX, 'id_nilai_diagnostik', 'ID Nilai Diagnostik'],
            ],
        );
    }   
}