<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaringDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilUjiSaringDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'uji_darah',
            'hasil_uji_saring_detail',
            'id_uji_saring_detail',
            [
                'id_uji_saring_detail' => V::TODO(),
                'id_uji_saring' => V::TODO(),
                'id_parameter_uji' => V::TODO(),
                'id_nilai_saring' => V::TODO(),
                'nilai_absorbance' => V::TODO()
            ],
        );
    }
}