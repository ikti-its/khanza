<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilDiagnostikDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'uji_darah',
            'hasil_diagnostik_detail',
            'id_diagnostik_detail',
            [
                'id_diagnostik_detail' => V::TODO(),
                'id_diagnostik' => V::TODO(),
                'id_parameter_uji' => V::TODO(),
                'id_nilai_diagnostik' => V::TODO()
            ],
        );
    }
}