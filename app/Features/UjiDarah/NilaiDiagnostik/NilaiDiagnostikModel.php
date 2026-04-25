<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiDiagnostik;
use App\Core\Model\ModelTemplate;

final class NilaiDiagnostikModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'uji_darah',
            'nilai_diagnostik',
            'id_nilai_diagnostik',
            [
                'id_nilai_diagnostik' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_nilai_diagnostik' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}