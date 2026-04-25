<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPremedikasi;
use App\Core\Model\ModelTemplate;

final class RefPremedikasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_premedikasi',
            'id_premedikasi',
            [
                'id_premedikasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_premedikasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}