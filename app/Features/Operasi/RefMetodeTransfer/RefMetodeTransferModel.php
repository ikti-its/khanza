<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMetodeTransfer;

use App\Core\ModelTemplate;

final class RefMetodeTransferModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_metode_transfer',
            'id_metode',
            [
                'id_metode' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_metode' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}