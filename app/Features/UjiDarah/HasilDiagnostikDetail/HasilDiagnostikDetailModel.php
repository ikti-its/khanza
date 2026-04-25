<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;

use App\Core\ModelTemplate;

final class HasilDiagnostikDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'uji_darah',
            'hasil_diagnostik_detail',
            'id_diagnostik_detail',
            [
                'id_diagnostik_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_diagnostik' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_parameter_uji' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_nilai_diagnostik' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}