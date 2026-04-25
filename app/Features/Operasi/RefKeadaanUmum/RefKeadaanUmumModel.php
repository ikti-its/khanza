<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKeadaanUmum;

use App\Core\ModelTemplate;

final class RefKeadaanUmumModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_keadaan_umum',
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