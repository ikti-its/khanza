<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisDonor;
use App\Core\Model\ModelTemplate;

final class MedisDonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'logistik_utd',
            'medis_donor',
            'id_medis_donor',
            [
                'id_medis_donor' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pengambilan_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_barang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'jumlah' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'harga' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}