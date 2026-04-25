<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningPernafasan;

use App\Core\ModelTemplate;

final class RefSkriningPernafasanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'skrining_rj',
            'ref_skrining_pernafasan',
            'id_pernafasan',
            [
                'id_pernafasan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'pernafasan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}