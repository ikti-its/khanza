<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiSaring;

use App\Core\ModelTemplate;

final class NilaiSaringModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'uji_darah',
            'nilai_saring',
            'id_nilai_saring',
            [
                'id_nilai_saring' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_nilai_saring' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}