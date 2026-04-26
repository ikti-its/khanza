<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\PemusnahanDetail;
use App\Core\Model\ModelTemplate;

final class PemusnahanDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'pemusnahan_darah',
            'pemusnahan_detail',
            'id_pemusnahan_detail',
            [
                'id_pemusnahan_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pemusnahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_stok_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_alasan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}