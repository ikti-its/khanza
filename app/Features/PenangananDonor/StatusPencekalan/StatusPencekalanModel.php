<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\StatusPencekalan;
use App\Core\Model\ModelTemplate;

final class StatusPencekalanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'penanganan_donor',
            'status_pencekalan',
            'id_status_pencekalan',
            [
                'id_status_pencekalan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status_pencekalan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}