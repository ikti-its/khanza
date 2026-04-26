<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\AlasanPemusnahan;
use App\Core\Model\ModelTemplate;

final class AlasanPemusnahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'pemusnahan_darah',
            'alasan_pemusnahan',
            'id_alasan',
            [
                'id_alasan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_alasan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}