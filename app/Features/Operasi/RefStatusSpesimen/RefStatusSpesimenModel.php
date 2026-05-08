<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusSpesimen;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStatusSpesimenModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_status_spesimen',
            'id_status_spesimen',
            [
                'id_status_spesimen' => V::TODO(),
                'nama_status' => V::TODO(),
            ],
        );
    }
}