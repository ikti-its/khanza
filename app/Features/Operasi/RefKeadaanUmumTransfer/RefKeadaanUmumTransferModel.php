<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmumTransfer;
use App\Core\Model\ModelTemplate;

final class RefKeadaanUmumTransferModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_keadaan_umum_transfer',
            'id_keadaan_umum',
            [
                'id_keadaan_umum' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_keadaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}