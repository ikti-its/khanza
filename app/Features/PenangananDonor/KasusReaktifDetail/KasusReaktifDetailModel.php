<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktifDetail;
use App\Core\Model\ModelTemplate;

final class KasusReaktifDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'kasus_reaktif_detail',
            'id_kasus_detail',
            [
                'id_kasus_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_kasus' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_uji_saring_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}