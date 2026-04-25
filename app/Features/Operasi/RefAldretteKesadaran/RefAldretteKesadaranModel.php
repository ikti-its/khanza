<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteKesadaran;

use App\Core\ModelTemplate;

final class RefAldretteKesadaranModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_aldrette_kesadaran',
            'id_kesadaran',
            [
                'id_kesadaran' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_skala' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nilai' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}