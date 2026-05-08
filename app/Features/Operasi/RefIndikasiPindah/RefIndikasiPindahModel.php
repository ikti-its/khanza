<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefIndikasiPindah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefIndikasiPindahModel extends ModelTemplate
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