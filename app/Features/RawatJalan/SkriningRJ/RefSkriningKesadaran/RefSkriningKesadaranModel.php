<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKesadaran;
use App\Core\Model\ModelTemplate;

final class RefSkriningKesadaranModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'skrining_rj',
            'ref_skrining_kesadaran',
            'id_kesadaran',
            [
                'id_kesadaran' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kesadaran' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}