<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPeralatanTransfer;

use App\Core\ModelTemplate;

class RefPeralatanTransferModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_peralatan_transfer',
            'id_peralatan',
            [
                'id_peralatan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_peralatan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}