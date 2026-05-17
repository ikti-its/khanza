<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKetersediaanStatus;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefKetersediaanStatusModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new RefKetersediaanStatusDatabase(),
            'REFS',
            'operasi',
            'ref_ketersediaan_status',
            'id_ketersediaan_status',
            [
                'id_ketersediaan_status' => V::DEFAULT(),
                'nama_ketersediaan'      => V::DEFAULT(),
            ],
            []
        );
    }
}