<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningBatuk;

use App\Core\ModelTemplate;

class RefSkriningBatukModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'skrining_rj',
            'ref_skrining_batuk',
            'id_batuk',
            [
                'id_batuk' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kategori_batuk' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}