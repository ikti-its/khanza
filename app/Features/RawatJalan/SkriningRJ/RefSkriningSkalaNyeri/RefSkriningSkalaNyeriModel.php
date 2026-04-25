<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningSkalaNyeri;
use App\Core\Model\ModelTemplate;

final class RefSkriningSkalaNyeriModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'skrining_rj',
            'ref_skrining_skala_nyeri',
            'id_skala_nyeri',
            [
                'id_skala_nyeri' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'skala_nyeri' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}