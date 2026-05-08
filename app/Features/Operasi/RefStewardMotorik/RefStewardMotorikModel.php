<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardMotorik;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefStewardMotorikModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_steward_motorik',
            'id_motorik',
            [
                'id_motorik' => V::TODO(),
                'nama_skala' => V::TODO(),
                'nilai' => V::TODO(),
            ],
        );
    }
}