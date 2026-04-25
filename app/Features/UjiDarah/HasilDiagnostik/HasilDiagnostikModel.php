<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostik;

use App\Core\ModelTemplate;

final class HasilDiagnostikModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'uji_darah',
            'hasil_diagnostik',
            'id_diagnostik',
            [
                'id_diagnostik' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_rujukan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_hasil' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'dokter_pemeriksa' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}