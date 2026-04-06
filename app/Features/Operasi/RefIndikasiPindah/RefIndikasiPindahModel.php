<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefIndikasiPindah;

use App\Core\ModelTemplate;

class RefIndikasiPindahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_indikasi_pindah',
            'id_indikasi',
            [
                'id_indikasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_indikasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}