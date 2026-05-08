<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesiapanAnestesi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKesiapanAnestesiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_kesiapan_anestesi',
            'id_kesiapan',
            [
                'id_kesiapan' => V::TODO(),
                'nama_kesiapan' => V::TODO(),
            ],
        );
    }
}