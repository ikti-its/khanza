<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaranPascaop;

use App\Core\ModelTemplate;

final class RefKesadaranPascaopModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_kesadaran_pascaop',
            'id_kesadaran',
            [
                'id_kesadaran' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_kesadaran' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}