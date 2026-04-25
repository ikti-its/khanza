<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\PemusnahanDarahDetail;
use App\Core\Model\ModelTemplate;

final class PemusnahanDarahDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'pemusnahan',
            'pemusnahan_darah_detail',
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