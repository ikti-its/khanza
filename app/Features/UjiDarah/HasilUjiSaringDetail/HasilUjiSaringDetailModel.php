<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaringDetail;
use App\Core\Model\ModelTemplate;

final class HasilUjiSaringDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'uji_darah',
            'hasil_uji_saring_detail',
            'id_uji_saring_detail',
            [
                'id_uji_saring_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_uji_saring' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_parameter_uji' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_nilai_saring' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nilai_absorbance' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}