<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAngkaAsa;

use App\Core\ModelTemplate;

final class RefAngkaAsaModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_angka_asa',
            'id_asa',
            [
                'id_asa' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_asa' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}