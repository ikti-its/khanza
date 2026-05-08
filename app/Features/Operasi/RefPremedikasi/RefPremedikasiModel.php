<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPremedikasi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefPremedikasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_premedikasi',
            'id_premedikasi',
            [
                'id_premedikasi' => V::TODO(),
                'nama_premedikasi' => V::TODO(),
            ],
        );
    }
}