<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\KebutuhanKhusus;
use App\Core\Model\ModelTemplate;

final class KebutuhanKhususModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'triase_ugd',
            'kebutuhan_khusus',
            'id_kebutuhan',
            [
                'id_kebutuhan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_kebutuhan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}