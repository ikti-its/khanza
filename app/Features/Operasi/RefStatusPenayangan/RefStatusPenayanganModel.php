<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusPenayangan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStatusPenayanganModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_status_penayangan',
            'id_status_penayangan',
            [
                'id_status_penayangan' => V::TODO(),
                'nama_status' => V::TODO(),
            ],
        );
    }
}