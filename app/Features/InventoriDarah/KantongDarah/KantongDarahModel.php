<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\KantongDarah;
use App\Core\Model\ModelTemplate;

final class KantongDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'kantong_darah',
            'id_bag',
            [
                'id_bag' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pengambilan_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'no_bag' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_jenis_bag' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}