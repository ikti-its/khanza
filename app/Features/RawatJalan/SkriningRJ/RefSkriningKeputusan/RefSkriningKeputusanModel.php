<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan;
use App\Core\Model\ModelTemplate;

final class RefSkriningKeputusanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'skrining_rj',
            'ref_skrining_keputusan',
            'id_keputusan',
            [
                'id_keputusan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'skrining_keputusan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}