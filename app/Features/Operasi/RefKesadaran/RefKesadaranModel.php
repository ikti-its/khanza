<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaran;

use App\Core\ModelTemplate;

class RefKesadaranModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_kesadaran',
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